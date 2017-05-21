;(function () {
  'use strict'

  var $cedula = $("#cedula")
  var $nombre = $("#nombre")
  var $apellido = $("#apellido")
  var $direccion = $("#direccion")
  var $celular = $("#celular")
  var $telefono = $("#telefono")
  var $email = $("#email")

  var $sangre = $("#sangre")
  var $edad = $("#edad")
  var $grado = $("#grado")
  var $sexo = $("#sexo")
  var $estdoCivil = $("#estdoCivil")
  var $tipoUser = $("#tipoUser")

  $("#containerTable").load("templates/table.php")

  $("#showForm").on("click", showFormHandle)
  $("#close").on("click", closeHandle)
  $("#save").on("click", saveHandle)

  function showFormHandle () {
    $("#tabla_principal").slideUp()
    $(".containerForm").slideDown()
  }

  function closeHandle (e) {
    e.preventDefault()
    cleanForm()
  }

  function cleanForm () {
    $("#tabla_principal").slideDown()
    $(".containerForm").slideUp()    
    $("#id").val("")
    $cedula.attr("disabled", false)
    $cedula.val("")
    $nombre.val("")
    $apellido.val("")
    $direccion.val("")
    $celular.val("")
    $telefono.val("")
    $email.val("")
    $sangre.val("")
    $edad.val("")
    $grado.val("")
    $sexo.val("")
    $estdoCivil.val("")
    $tipoUser.val("")
    $("select").select2({dropdownCssClass: 'dropdown-inverse'});
  }

  function saveHandle (e) {
    e.preventDefault()
    if(validarForm()) {
      $.ajax({
        type: "POST",
        url: "service/guardar.php",
        data: getData()
      })
      .done(function (snap) {
        console.log(snap)
        if(snap == 2) {
          cleanForm()
          $("#containerTable").load("templates/table.php")          
          toast("Se ha guardado con exito")
        }
        if(snap == 1) {
          toast("El numero de cedula la existe")
          $cedula.focus()
        }
      })
    }
  }

  function getData () {
    return {
      id: $("#id").val(),
      cedula: $cedula.val(),
      nombre: $nombre.val(),
      apellido: $apellido.val(),
      direccion: $direccion.val(),
      celular: $celular.val(),
      telefono: $telefono.val(),
      email: $email.val(),
      sangre: $sangre.val(),
      edad: $edad.val(),
      grado: $grado.val(),
      sexo: $sexo.val(),
      estdoCivil: $estdoCivil.val(),
      tipoUser: $tipoUser.val()
    }
  }

  function validarForm () {
    if($cedula.val() === "") {
      toast("Ingresa el numero de cedula")
      $cedula.focus()
      return false
    }
    if(!valida_ce($cedula.val())){
      $cedula.focus()
      return false
    }
    if($nombre.val() === "") {
      toast("Ingresa el nombre")
      $nombre.focus()
      return false
    }
    if($apellido.val() === "") {
      toast("Ingresa el apellido")
      $apellido.focus()
      return false
    }
    if($direccion.val() === "") {
      toast("Ingresa la direccion")
      $direccion.focus()
      return false
    }
    if($celular.val() === "") {
      toast("Ingresa el numero celular")
      $celular.focus()
      return false
    }
    if($celular.val().length < 10) {
      toast("Porfavor ingrese un numero celular correcto")
      $celular.focus()
      return false
    }
    if($telefono.val() === "") {
      toast("Ingresa el numero de telefono")
      $telefono.focus()
      return false
    }
    if($telefono.val().length < 9) {
     toast("Porfavor ingrese un numero de telefono correcto")
      $telefono.focus()
      return false
    }
    if($email.val() === "") {
      toast("Ingresa el e-mail")
      $email.focus()
      return false
    }
    if(emailValid($email.val()) === false){
      $email.focus()
      toast("Porfavor ingrese un e-mail valido")
      return false
    }
    if($sangre.val() === "") {
      toast("Ingresa el tipos de sangre")
      $sangre.focus()
      return false
    }
    if($edad.val() === "") {
      toast("Ingresa la edad")
      $edad.focus()
      return false
    }
    if($grado.val() === "") {
      toast("Ingresa el grado militar")
      $grado.focus()
      return false
    }
    if($sexo.val() === "") {
      toast("Ingresa el sexo")
      $grado.focus()
      return false
    }
    if($estdoCivil.val() === "") {
      toast("Ingresa el estdo civil")
      $estdoCivil.focus()
      return false
    }
    if($tipoUser.val() === ""){
      toast("Porfavor ingrese el tipo de usuario")
      $tipoUser.focus()
      return false
    }
    return true
  }

})()