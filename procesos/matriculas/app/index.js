;(function () {
  'use strict'

  // $("#containerTable").load("templates/table.php")
  $("#tabla_principal").slideUp()  
  $(".containerForm").slideDown()
  $("#alumosContainer").fadeIn()  

  var maester = new MaesterDetail()

  $("#showForm").on("click", showFormHandle)
  // $("#close").on("click", closeHandle)
  $("#save").on("click", saveHandle)
  
  $("#alumnosList").on("click", alumnosHandle)
  $("#closeAlumnos").on("click", closeAlumnosnHandle)
  $("#aceptAlumnos").on("click", loadAlumnos)
  $("#formacion").on("change", changeHandleCurso)
  $("#grado-panel").on("change", changeHandelGrado)

   $("#showMaterias").on("click", function (e){
    e.preventDefault()
    $("#alumosContainer").fadeOut(function () {
      $("#materiasContainer").fadeIn()
    })
  })

  $("#showAlumnos").on("click", function (e){
    e.preventDefault()    
    $("#materiasContainer").fadeOut(function () {
      $("#alumosContainer").fadeIn()
    })
  })

  $("#ver-video").on("click", function (e) {
    e.preventDefault()
    var video = e.currentTarget.dataset.video

    if(video == "") {
      toast("Debe selecionar le curso para ver el video")
    }else {
      $(".panel-video").slideDown()
      var template = `<iframe class="youtube-player" type="text/html" width="640" height="335" 
          src="http://www.youtube.com/embed/${video}" frameborder="0">
      </iframe>`
      $("#video-panel").html(template)
    }
  })

  $("#closeVideo").on("click", function (e) {
    e.preventDefault()
    $(".panel-video").slideUp()
  })

  function showFormHandle () {
    document.getElementById("save").dataset.action = "guardar"
    $("#tabla_principal").slideUp()
    $(".containerForm").slideDown()
  }

  function alumnosHandle (e) {
    e.preventDefault()
    $(".panel-alumnos").slideDown()
  }

  function closeAlumnosnHandle (e) {
    e.preventDefault()
    $(".panel-alumnos").slideUp()
  }

  function changeHandleCurso (e){
    e.preventDefault()
    var id = $("#formacion").val()

    $.ajax({
      type: "GET",
      url: "service/get.php",
      data: { id },
      dataType: "JSON"
    })
    .done(function (snap) {
      console.log(snap)
      $("#id").val(snap.curso.codigo)
      $("#curso-alias").val(snap.curso.alias)
      $("#curso").val(snap.curso.curso)
      $("#nomina").val(snap.curso.nomina)
      $("#fecha-inicio").val(snap.curso.fecha)
      $("#fecha-final").val(snap.curso.fin)
      $("#video").val(snap.curso.video)
      $("select").select2({dropdownCssClass: 'dropdown-inverse'})
      document.getElementById("ver-video").dataset.video = snap.curso.video
      loadMaterias(snap.materias)
    })
  }

  function loadMaterias (detalle) {
    for (var i in detalle) {
      var item = detalle[i]

      var context = {
        id: item.codigo,
        name: item.materia,
        profesor: item.profesor
      }
     cursoZpador.materias.push(context)
    }
    maester.buildMateria()
  }

  function loadAlumnos (e) {
    var alumnosList = document.querySelectorAll(".alumnosList")
    var alumnos = Array.prototype.slice.call(alumnosList)
    var count = 0

    for (var i in alumnos) {
      var item = alumnos[i]
      if(item.checked === true){
        var id = item.dataset.id
        var name = item.dataset.name
        maester.save({ id, name })
        item.checked = false
      }
      else count++
    }
    if(alumnos.length === count)
      toast("No ha ingresado ninguna alumno")
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

  function changeHandelGrado () {
    var grado = $("#grado-panel").val()
    if(grado === ""){
      $(".alumnoPanel").fadeIn()
    }
    else {
      $(".alumnoPanel").fadeOut()
      $(`[data-grado='${grado}']`).fadeIn()
    }
  }

})()