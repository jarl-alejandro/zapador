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
      $("#id").val(snap.zu_ced)
      $("#cedula").val(snap.zu_ced)
      $("#nombre").val(snap.zu_nom)
      $("#apellido").val(snap.zu_ape)
      $("#direccion").val(snap.zu_dir)
      $("#celular").val(snap.zu_cel)
      $("#telefono").val(snap.zu_tel)
      $("#email").val(snap.zu_ema)

      $("#sangre").val(snap.zn_san)
      $("#edad").val(snap.zn_eda)
      $("#grado").val(snap.zn_gra)
      $("#sexo").val(snap.zn_sex)
      $("#estdoCivil").val(snap.zn_civ)
      $("#tipoUser").val(snap.zn_tipo)
      $("select").select2({dropdownCssClass: 'dropdown-inverse'});

      $("#cedula").attr("disabled", true)
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