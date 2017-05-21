;(function () {
  'use strict'

  $("#containerTable").load("templates/table.php")
  
  var dateMin = $("#DateMin").val()
  $( '.fechaPicker' ).pickadate({
    min: dateMin
  })

  var maester = new MaesterDetail()

  $("#showForm").on("click", showFormHandle)
  $("#close").on("click", closeHandle)
  $("#save").on("click", saveHandle)
  
  $("#aceptMaterias").on("click", aceptMaterias)

  $("#materiasList").on("click", function (e) {
    e.preventDefault()
    $(".panel-materias").slideDown()
  })

  $("#closeMaterias").on("click", function () {
    $(".panel-materias").slideUp()    
  })

  function showFormHandle () {
    document.getElementById("save").dataset.action = "guardar"
    $("#tabla_principal").slideUp()
    $(".containerForm").slideDown()
  }

  function aceptMaterias (e) {
    var materiasList = document.querySelectorAll(".materiasList")
    var materias = Array.prototype.slice.call(materiasList)
    var count = 0

    for (var i in materias){
      var item = materias[i]
      if(item.checked === true){
        var id = item.dataset.id
        var name = item.dataset.name
        maester.saveMateria({ id, name })
        item.checked = false
      }
      else count++
    }

    if(materias.length === count)
      toast("No ha ingresado ninguna materia")
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