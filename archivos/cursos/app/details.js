'use strict'

var cursoZpador = {}
cursoZpador.details = []

var MaesterDetail = function MaesterDetail () {
  this.details = []
  this.$polvorinBody = $("#polvorinBody")
  this.$curso = $("#curso")
  this.$creditos = $("#creditos")
  this.$materias = $("#materias")
  this.$cantEst = $("#numeroEstudiantes")
  this.$extra = $("#numeroExtra")
}

MaesterDetail.prototype = {
  saveCurso: function saveCurso(action) {
    if(this.validarCurso()){
      $.ajax({
        type: "POST",
        data: { curso: this.$curso.val(), creditos: this.$creditos.val(), 
                materias: this.$materias.val(), detalle: cursoZpador.details, id: $("#id").val(),
                extra: this.$extra.val(), cantEst: this.$cantEst.val()
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
    if( this.validar(object) && this.existPolvorin(object)){
      this.insertData(object)
      this.build()
      this.cleaned(object.id)
    }
  },

  insertData: function insertData (data) {
    cursoZpador.details.push(data)
  },

  build: function build (){
    this.$polvorinBody.html("")

    for(var i in cursoZpador.details){
      var item = cursoZpador.details[i]
      var trTag = `<tr>
        <td class="text-center">${ item.cant }</td>
        <td>${ item.detalle }</td>
        <td class="text-center">
          <button class="btn btn-embossed btn-danger eliminarPolvorin" data-index="${i}"><i class="fui-cross"></i></button>
        </td>
      </tr>`
      this.$polvorinBody.append(trTag)
    }

    $(".eliminarPolvorin").on("click", function (e) {
      e.preventDefault()
      var index = e.currentTarget.dataset.index
      cursoZpador.details.splice(index, 1)
      this.build()
    }.bind(this))
  },

  cleaned: function cleaned(id) {
    $(`#polvorin_${id}`).val("")
    $(".panel-polvorin").slideUp()
  },

  close: function close () {
    $("#tabla_principal").slideDown()
    $(".containerForm").slideUp()    
    $("#id").val("")
    var template = '<td colspan="3" class="text-center">Ingrese el polvorin</td>'
    this.$polvorinBody.html(template)
    cursoZpador.details = []
    this.$curso.val("")
    this.$creditos.val("")
    this.$materias.val("")
    this.$cantEst.val("")
    this.$extra.val("")
  },

  validar: function validar (object){
    var inputTag = $(`#polvorin_${object.id}`)

    if(inputTag.val() === "" || inputTag.val() == 0){
      toast(`Porfavor ingrese la cantida de ${ object.detalle }`)
      inputTag.focus()
      return false
    }
    if( parseInt(inputTag.val()) > object.cant){
      toast(`No puede exceder mas de ${ object.cant } ${ object.detalle }`)
      inputTag.focus()
      return false
    }
    else return true
  },

  existPolvorin: function existPolvorin (object) {
    var flag = false

    if(cursoZpador.details.length === 0){
      return true
    }
    for(var i in cursoZpador.details){
      var item = cursoZpador.details[i]
      if(item.id == object.id){
        item.cant = parseInt(item.cant) + parseInt($(`#polvorin_${object.id}`).val())
        this.build()
        this.cleaned(object.id)
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
    if(this.$creditos.val() === ""){
      toast("Ingrese los creditos del curso")
      this.$creditos.focus()
      return false
    }
    if(this.$materias.val() === ""){
      toast("Ingrese el numero de materias que se necesita para cursar")
      this.$materias.focus()
      return false
    }
    if(this.$cantEst.val() === ""){
      toast("Ingrese el numero de estudiantes")
      this.$cantEst.focus()
      return false
    }
    if(this.$extra.val() === ""){
      toast("Ingrese el numero de extra del polvorin")
      this.$extra.focus()
      return false
    }
    if(cursoZpador.details.length === 0){
      toast("Porfavor ingrese los polvorines que necesita este curso")
      return false
    }
    else return true
  }

}