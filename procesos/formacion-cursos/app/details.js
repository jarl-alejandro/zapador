'use strict'

var cursoZpador = {}
cursoZpador.alumnos = []
cursoZpador.materias = []

var MaesterDetail = function MaesterDetail () {
  this.$alumnosBody = $("#alumnosBody")
  this.$materiasBody = $("#materiasBody")
  this.$nomina = $("#nomina")
  this.$curso = $("#curso")
  this.$fechaInicio = $("#fecha-inicio")
  this.$fechaFinal = $("#fecha-final")
  this.$video = $("#video")
  this.$alias = $("#curso-alias")
}

MaesterDetail.prototype = {
  saveCurso: function saveCurso(action) {
    if(this.validarCurso()){
      $.ajax({
        type: "POST",
        data: { curso: this.$curso.val(), nomina: this.$nomina.val(), 
                fechaInicio: this.$fechaInicio.val(), video: this.$video.val(),
                id: $("#id").val(), materias: cursoZpador.materias, alias: this.$alias.val(),
                fechaFinal: this.$fechaFinal.val()
              },
        url: `service/${action}.php`
      })
      .done(function (snap) {
        console.log(snap)
        if(snap == 2) {
          this.close()
          $("#containerTable").load("templates/table.php")
        }
      }.bind(this))
    }
  },

  save: function save (object){
    if(this.existAlumno(object)){
      this.insertData(object)
      this.build()
      $(".panel-alumnos").slideUp()
    }
  },

  saveMateria: function saveMateria (object){
    if(this.existMateria(object)){
      cursoZpador.materias.push(object)
      this.buildMateria()
      $(".panel-materias").slideUp()
    }
  },

  insertData: function insertData (data) {
    cursoZpador.alumnos.push(data)
  },

  build: function build (){
    this.$alumnosBody.html("")

    for(var i in cursoZpador.alumnos){
      var item = cursoZpador.alumnos[i]
      var trTag = `<tr>
        <td>${ item.name }</td>
        <td class="text-center">
          <button class="btn btn-embossed btn-danger eliminarAlumnos" data-index="${i}"><i class="fui-cross"></i></button>
        </td>
      </tr>`
      this.$alumnosBody.append(trTag)
    }

    $(".eliminarAlumnos").on("click", function (e) {
      e.preventDefault()
      var index = e.currentTarget.dataset.index
      cursoZpador.alumnos.splice(index, 1)
      this.build()
    }.bind(this))
  },

  buildMateria: function buildMateria () {
    this.$materiasBody.html("")

    for(var i in cursoZpador.materias){
      var item = cursoZpador.materias[i]
      var trTag = `<tr>
        <td>${ item.name }</td>
        <td class="text-center">
          <button class="btn btn-embossed btn-danger eliminarMateria" data-index="${i}"><i class="fui-cross"></i></button>
        </td>
      </tr>`
      this.$materiasBody.append(trTag)
    }

    $(".eliminarMateria").on("click", function (e) {
      e.preventDefault()
      var index = e.currentTarget.dataset.index
      cursoZpador.materias.splice(index, 1)
      this.buildMateria()
    }.bind(this))

  },

  close: function close () {
    $("#tabla_principal").slideDown()
    $(".containerForm").slideUp()    
    $("#id").val("")
    var template = '<td colspan="3" class="text-center">Ingrese los alumnos</td>'
    var templateMat = '<td colspan="3" class="text-center">Ingrese las materias</td>'
    this.$alumnosBody.html(template)
    this.$materiasBody.html(templateMat)
    cursoZpador.alumnos = []
    cursoZpador.materias = []

    this.$nomina.val("")
    this.$curso.val("")
    this.$fechaInicio.val("")
    this.$video.val("")
    $("select").select2({dropdownCssClass: 'dropdown-inverse'})
  },

  existAlumno: function existAlumno (object) {
    var flag = false

    if(cursoZpador.alumnos.length === 0){
      return true
    }

    for(var i in cursoZpador.alumnos){
      var item = cursoZpador.alumnos[i]
      if(item.id == object.id){
        toast(`Hay alumnos en la lista`)
        return false
      }
      else flag = true
    }
    return flag
  },

  existMateria: function existMateria (object) {
     var flag = false

    if(cursoZpador.materias.length === 0){
      return true
    }

    for(var i in cursoZpador.materias){
      var item = cursoZpador.materias[i]
      if(item.id == object.id){
        toast(`Hay materias en la lista`)
        return false
      }
      else flag = true
    }
    return flag
  },

  validarCurso: function validarCurso() {
    if(this.$alias.val() === "") {
      toast("Ingrese el nombre del curso")
      this.$alias.focus()
      return false
    }
    if(this.$curso.val() === ""){
      toast("Ingrese el curso")
      this.$curso.focus()
      return false
    }
    if(this.$nomina.val() === ""){
      toast("Ingrese el organizador del curso")
      this.$nomina.focus()
      return false
    }
    if(this.$fechaInicio.val() === ""){
      toast("Ingrese la fecha que va a iniciar el curso")
      this.$fechaInicio.focus()
      return false
    }
    if(this.$fechaFinal.val() === "") {
      toast("Ingrese la fecha que va a finalizar el curso")
      this.$fechaFinal.focus()
      return false
    }
    if(this.$fechaInicio.val() > this.$fechaFinal.val()){
      toast("Ingrese la fecha final no puede ser menor que que la fecha inicial")
      this.$fechaFinal.focus()
      return false
    }
    if(this.$video.val() === ""){
      toast("Ingrese el video del curso")
      this.$video.focus()
      return false
    }
    if(cursoZpador.materias.length === 0){
      toast("Porfavor ingrese las materias que van a ingresar a este curso")
      $(".panel-materias").slideDown()
      return false 
    }
    else return true
  }

}