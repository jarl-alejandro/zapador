;(function () {
  'use strict'

  var $materia = $("#materia")
  var $nomina = $("#nomina")

  $("#containerTable").load("templates/table.php")

  $("#showForm").on("click", showFormHandle)
  $("#close").on("click", closeHandle)
  $("#save").on("click", saveHandle)

  function showFormHandle () {
    $("#tabla_principal").slideUp()
    $(".containerForm").slideDown()
  }

  function closeHandle (e) {
    e.preventDefault()
    cleanForm()
  }

  function cleanForm () {
    $("#tabla_principal").slideDown()
    $(".containerForm").slideUp()    
    $("#id").val("")
    $materia.val("")
    $nomina.val("")
    $("select").select2({dropdownCssClass: 'dropdown-inverse'});
  }

  function saveHandle (e) {
    e.preventDefault()
    if(validarForm()) {
      $.ajax({
        type: "POST",
        url: "service/guardar.php",
        data: getData()
      })
      .done(function (snap) {
        console.log(snap)
        if(snap == 2) {
          cleanForm()
          $("#containerTable").load("templates/table.php")          
          toast("Se ha guardado con exito")
        }
        if(snap == 1) {
          toast("La materia ya existe")
          $materia.focus()
        }
      })
    }
  }

  function getData () {
    return {
      id: $("#id").val(),
      materia: $materia.val(),
      nomina: $nomina.val(),
    }
  }

  function validarForm () {
    if($materia.val() === "") {
      toast("Ingresa la mater$materia")
      $materia.focus()
      return false
    }
    if($nomina.val() === "") {
      toast("Ingresa el nomina")
      $nomina.focus()
      return false
    }
    return true
  }

})()