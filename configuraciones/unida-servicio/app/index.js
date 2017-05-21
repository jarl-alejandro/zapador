;(function () {
  'use strict'

  var $unidad = $("#unidad")
  var $detalle = $("#detalle")

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
    $unidad.val("")
    $detalle.val("")
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
          toast("El unidad de service ya existe")
          $unidad.focus()
        }
      })
    }
  }

  function getData () {
    return {
      id: $("#id").val(),
      unidad: $unidad.val(),
      detalle: $detalle.val(),
    }
  }

  function validarForm () {
    if($unidad.val() === "") {
      toast("Ingresa la unidad de servicio")
      $unidad.focus()
      return false
    }
    if($detalle.val() === "") {
      toast("Ingresa el detalle")
      $detalle.focus()
      return false
    }
    return true
  }

})()