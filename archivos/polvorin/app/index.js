;(function () {
  'use strict'

  var $polvorin = $("#polvorin")
  var $cant = $("#cant")
  var $max = $("#max")
  var $min = $("#min")
  var $categoria = $("#categoria")

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
    $polvorin.val("")
    $cant.val("")
    $max.val("")
    $min.val("")
    $categoria.val("")
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
          toast("La polvorin ya existe")
          $polvorin.focus()
        }
      })
    }
  }

  function getData () {
    return {
      id: $("#id").val(),
      polvorin: $polvorin.val(),
      cant: $cant.val(),
      max: $max.val(),
      min: $min.val(),
      categoria: $categoria.val(),
    }
  }

  function validarForm () {
    if($polvorin.val() === "") {
      toast("Ingresa el polvorin")
      $polvorin.focus()
      return false
    }
    if($cant.val() === "") {
      toast("Ingresa el cantidad")
      $cant.focus()
      return false
    }
    if($max.val() === "") {
      toast("Ingresa el maximo")
      $max.focus()
      return false
    }
    if(parseInt($max.val()) < parseInt($cant.val())){
      toast("La cantidad no puede ser mayor que la cantidad maxima")
      $cant.focus()
      return false
    }
    if($min.val() === "") {
      toast("Ingresa el minimo")
      $min.focus()
      return false
    }
     if(parseInt($min.val()) > parseInt($cant.val())){
      toast("La cantidad no puede ser menor que la cantidad minima")
      $cant.focus()
      return false
    }
    if($categoria.val() === "") {
      toast("Ingresa la categoria")
      $categoria.focus()
      return false
    }
    return true
  }

})()