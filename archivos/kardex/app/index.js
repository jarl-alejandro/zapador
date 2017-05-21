;(function () {
  'use strict'

  $("#containerTable").load("templates/table.php")

  var $detalle = $("#detalle")
  var $cant = $("#cant")

  $("#close").on("click", closeHandle)
  $("#save").on("click", saveHandle)

  function closeHandle (e) {
    e.preventDefault()
    cleanForm()
  }

  function cleanForm () {
    $("#tabla_principal").slideDown()
    $(".containerForm").slideUp()    
    $detalle.val("")
    $cant.val("")
    $("#id").val("")
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
          toast("La detalle ya existe")
          $detalle.focus()
        }
      })
    }
  }

  function getData () {
    return {
      id: $("#id").val(),
      detalle: $detalle.val(),
      cant: $cant.val(),
    }
  }

  function validarForm () {
    if($detalle.val() === "") {
      toast("Ingresa el infome")
      $detalle.focus()
      return false
    }
    if($cant.val() === "") {
      toast("Ingresa el cantidad")
      $cant.focus()
      return false
    }
    return true
  }

})()