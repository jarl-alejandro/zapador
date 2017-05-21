;(function () {
  'use strict'

  $("#containerTable").load("templates/table.php")

  var maester = new MaesterDetail()

  $("#showForm").on("click", showFormHandle)
  $("#close").on("click", closeHandle)
  $("#save").on("click", saveHandle)
  $("#polvorin").on("click", polvorinHandle)
  $("#closePolvorin").on("click", closePolvorinHandle)
  $("#aceptPolvorin").on("click", polvorinAddHandle)

  function showFormHandle () {
    document.getElementById("save").dataset.action = "guardar"
    $("#tabla_principal").slideUp()
    $(".containerForm").slideDown()
  }

  function polvorinHandle (e) {
    e.preventDefault()
    $(".panel-polvorin").slideDown()
  }

  function closePolvorinHandle (e) {
    e.preventDefault()
    $(".panel-polvorin").slideUp()
  }

  function polvorinAddHandle (e) {
    if( $("#numeroEstudiantes").val() === "" ){
      $(".panel-polvorin").slideUp()      
      toast("Porfavor ingrese los estudaintes que pueden ingresar en este curso")
      $("#numeroEstudiantes").focus()
      return false
    }
    if( $("#numeroExtra").val() === "" ){
      $(".panel-polvorin").slideUp()      
      toast("Porfavor ingrese el nuemro extra curso")
      $("#numeroExtra").focus()
      return false
    }
    var cant = parseInt($("#numeroEstudiantes").val()) + parseInt($("#numeroExtra").val())
    var polvorinList = document.querySelectorAll(".polvorinList")
    var polvorin = Array.prototype.slice.call(polvorinList)
    var count = 0

    for (var i in polvorin) {
      var item = polvorin[i]
      if(item.checked === true){
        var id = item.dataset.id
        var detalle = item.dataset.name
        maester.save({ id, cant, detalle })
        item.checked = false
      }
      else count++
    }
    if(polvorin.length === count)
      toast("No ha ingresado ninguna polvorin")
  }

  function closeHandle (e) {
    e.preventDefault()
    cleanForm()
  }

  function cleanForm () {
    maester.close()
  }

  function saveHandle (e) {
    e.preventDefault()
    maester.saveCurso(e.currentTarget.dataset.action)
  }

})()