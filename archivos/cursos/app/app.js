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
      $("#id").val(snap.curso.zc_codigo)
      $("#curso").val(snap.curso.zc_curso)
      $("#creditos").val(snap.curso.zc_creditos)
      $("#materias").val(snap.curso.zc_materias)
      $("#numeroEstudiantes").val(snap.curso.zc_est)
      $("#numeroExtra").val(snap.curso.zc_extra)

      loadDetails(snap.detalle)

      $(".containerForm").slideDown()
      $("#tabla_principal").slideUp()
    })
  }

  function loadDetails (detalle) {
    for (var i in detalle) {
      var item = detalle[i]

      var context = {
        id: item.polvorin,
        detalle: item.nombre,
        cant: item.cant
      }
      maester.insertData(context)
    }
    maester.build()
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