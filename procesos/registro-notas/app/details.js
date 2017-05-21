'use strict'

var cursoZpador = {}
cursoZpador.alumnos = []
cursoZpador.materias = []

var MaesterDetail = function MaesterDetail () {
  this.$alumnosBody = $("#alumnosBody")
  this.$materiasBody = $("#materiasBody")
  this.$curso = $("#formacion")
}

MaesterDetail.prototype = {
  saveCurso: function saveCurso(action) {
    if(this.validarCurso()){
      $.ajax({
        type: "POST",
        data: { 
                id: $("#id").val(), alumnos: cursoZpador.alumnos,
                materias: cursoZpador.materias
              },
        url: `service/${action}.php`
      })
      .done(function (snap) {
        console.log(snap)
        if(snap == 2) {
          this.close()
          // $("#containerTable").load("templates/table.php")
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
        <td>${ item.estudiante }</td>
        <td><input type="text" onkeypress="decimal()" class="form-control nota" 
            data-nota="1${item.index}" data-index="1" data-id="${item.index}" value="${item.nota1}"/>
        </td>
        <td><input type="text" onkeypress="decimal()" class="form-control nota" 
            data-nota="2${item.index}" data-index="2" data-id="${item.index}" value="${item.nota2}"/>
        </td>
        <td><input type="text" onkeypress="decimal()" class="form-control nota" 
            data-nota="3${item.index}"data-index="3" data-id="${item.index}" value="${item.nota3}"/>
        </td>
      </tr>`
      this.$materiasBody.append(trTag)
    }
    $(".nota").keyup(function (e){
      setTimeout(function() {
        this.nota(e)
      }.bind(this), 300);
    }.bind(this))
    // $(".nota").keypress(this.saveNota)

    // $(".nota").keyup(this.nota)
  },

  nota: function nota (e) {
    var id = e.currentTarget.dataset.id
    var nota = e.currentTarget.dataset.nota
    var index = e.currentTarget.dataset.index
    var indexPrev = index - 1
    var input = $(`[data-nota="${nota}"]`)
    var inputPrev = $(`[data-nota="${indexPrev}${id}"]`)

    if( parseFloat(input.val()) < 2){
      toast("No puede ser menor que 2")
      input.focus()
      // input.val(2)
      return false
    }
    if( parseFloat(input.val()) > 10){
      toast("No puede ser mayor que 10")
      input.focus()
      input.val(10)
      return false
    }
    if(inputPrev.val() == 0){
      toast("Debe ingresar primero la nota anterior")
      input.val(0)
      inputPrev.focus()
      return false
    }
    $.ajax({
      type: "POST",
      url: "service/guardar.php",
      data: { id, nota: input.val(), campo:`nota${index}` }
    })
    .done(function (snap) {
      console.log(snap)
      if(snap == 2) {
        toast("Se ha guardado con exito la nota")
      }
    })
  },

  close: function close () {
    // $("#tabla_principal").slideDown()
    // $(".containerForm").slideUp()    
    $("#id").val("")
    var template = '<td colspan="5" class="text-center">Ingrese los alumnos</td>'
    var templateMat = '<td colspan="5" class="text-center">Ingrese las materias</td>'
    this.$alumnosBody.html(template)
    this.$materiasBody.html(templateMat)
    cursoZpador.alumnos = []
    cursoZpador.materias = []

    $("#id").val("")
    $("#formacion").val("")
    $("#curso").val("")
    $("#nomina").val("")
    $("#fecha-inicio").val("")
    $("#fecha-final").val("")
    $("#video").val("")
    $("select").select2({dropdownCssClass: 'dropdown-inverse'})
    $(".containerForm").slideUp()
    $("#tabla_principal").slideDown()
    document.getElementById("ver-video").dataset.video = ""
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
    if(this.$curso.val() === ""){
      toast("Ingrese el curso")
      this.$curso.focus()
      return false
    }
    if(cursoZpador.alumnos.length === 0){
      toast("Porfavor ingrese los alumnos que van a ingresar a este curso")
      $("#materiasContainer").fadeOut(function () {
        $("#alumosContainer").fadeIn()
      })
      return false
    }
    else return true
  }

}