;(function () {
  'use strict'

  var maester = new MaesterDetail()

  var $eliminar = $(".eliminar")
  var $editar = $(".editar")

  $editar.on("click", editarHandle)
  $eliminar.on("click", eliminarHandle)

  function editarHandle (e) {
    var id = e.currentTarget.dataset.id
    $.ajax({
      type: "GET",
      data: { id },
      url: "service/get.php",
      dataType: "JSON"
    })
    .done(function (snap){
      document.getElementById("save").dataset.action = "actualizar"
      $("#id").val(snap.curso.codigo)
      $("#curso-alias").val(snap.curso.alias)
      $("#curso").val(snap.curso.curso)
      $("#nomina").val(snap.curso.nomina)
      $("#fecha-inicio").val(snap.curso.fecha)
      $("#video").val(snap.curso.video)
      $("select").select2({dropdownCssClass: 'dropdown-inverse'})

      loadMaterias(snap.materias)

      $(".containerForm").slideDown()
      $("#tabla_principal").slideUp()
    })
  }

  function loadMaterias (detalle) {
    for (var i in detalle) {
      var item = detalle[i]

      var context = {
        id: item.codigo,
        name: item.materia,
      }
     cursoZpador.materias.push(context)
    }
    maester.buildMateria()
  }

  function eliminarHandle (e) {
    var id = e.currentTarget.dataset.id
    $.ajax({
      type: "POST",
      data: { id },
      url: "service/eliminar.php"
    })
    .done(function (snap){
      if(snap == 2) {
        toast("Se ha eliminado con exito...")
        $("#containerTable").load("templates/table.php")
      }
    })
  }

})()