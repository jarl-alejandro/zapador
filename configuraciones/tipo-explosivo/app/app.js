;(function () {
  'use strict'

  var $eliminar = $(".eliminar")
  var $editar = $(".editar")

  $editar.on("click", editarHandle)
  $eliminar.on("click", eliminarHandle)

  function editarHandle (e) {
    var id = e.currentTarget.dataset.id

    $.ajax({
      type: "POST",
      data: { id },
      url: "service/get.php",
      dataType: "JSON"
    })
    .done(function (snap){
      $("#id").val(snap.zt_cod)
      $("#tipo").val(snap.zt_expl)
      $("#detalle").val(snap.zt_det)
      $(".containerForm").slideDown()
      $("#tabla_principal").slideUp()
    })
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