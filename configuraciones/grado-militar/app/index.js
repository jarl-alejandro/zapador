;(function () {
  'use strict'

  var $grado = $("#grado")

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
    $grado.val("")
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
          toast("El grado militar ya existe")
          $grado.focus()
        }
      })
    }
  }

  function getData () {
    return {
      id: $("#id").val(),
      grado: $grado.val(),
    }
  }

  function validarForm () {
    if($grado.val() === "") {
      toast("Ingresa el grado militar")
      $grado.focus()
      return false
    }
    return true
  }

})()