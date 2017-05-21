;(function () {
  'use strict'

  var $tipo = $("#tipo")
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
    $tipo.val("")
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
          toast("El tipo de explosivo ya existe")
          $tipo.focus()
        }
      })
    }
  }

  function getData () {
    return {
      id: $("#id").val(),
      tipo: $tipo.val(),
      detalle: $detalle.val(),
    }
  }

  function validarForm () {
    if($tipo.val() === "") {
      toast("Ingresa el tipo de explosivo")
      $tipo.focus()
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