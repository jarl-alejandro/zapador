;(function () {
  'use strict'

  var maester = new MaesterDetail()

  $(".editar").on("click", handelEdit)

  function handelEdit (e) {
    var id = e.currentTarget.dataset.id
     $.ajax({
      type: "GET",
      url: "service/get.php",
      data: { id },
      dataType: "JSON"
    })
    .done(function (snap) {
      console.log(snap)
      $("#id").val(snap.curso.codigo)
      $("#formacion").val(snap.curso.codigo)
      $("#curso-alias").val(snap.curso.alias)
      $("#curso").val(snap.curso.curso)
      $("#nomina").val(snap.curso.nomina)
      $("#fecha-inicio").val(snap.curso.fecha)
      $("#fecha-final").val(snap.curso.fin)
      $("#video").val(snap.curso.video)
      $("select").select2({dropdownCssClass: 'dropdown-inverse'})
      document.getElementById("ver-video").dataset.video = snap.curso.video
      loadMaterias(snap.materias)
      $(".containerForm").slideDown()
      $("#tabla_principal").slideUp()
    })
  }

  function loadMaterias (detalle) {
    for (var i in detalle) {
      var item = detalle[i]

      var context = {
        index: item.id,
        id: item.codigo,
        name: item.materia,
        cedula: item.cedula,
        estudiante: item.estudiante,
        nota1: item.nota1,
        nota2: item.nota2,
        nota3: item.nota3,
      }
     cursoZpador.materias.push(context)
    }
    maester.buildMateria()
  }
  
})()