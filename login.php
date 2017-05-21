<?php 
session_start();
if(isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){
  header("Location: configuraciones/principal");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesión | Zapador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/flat-ui.css" rel="stylesheet">
    <link href="assets/css/zapador.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico">
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <style>
    body{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .containerLogin{
      width: 30em;
    }
    </style>
  </head>
  <body>
    <div class="toast">Zapador! v1.0</div>

    <main class="containerLogin">
      <div class="login-form">
        <div class="form-group">
          <input type="text" class="form-control login-field" placeholder="Escribe tu e-mail" id="login-email" />
          <label class="login-field-icon fui-user" for="login-name"></label>
        </div>
        <div class="form-group">
          <input type="password" class="form-control login-field" placeholder="Escribe tu contraseñas" id="login-pass" />
          <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>
        <a class="btn btn-primary btn-embossed btn-lg btn-block" href="#" id="login-btn">Log in</a>
        <a class="login-link" href="#">¿Olivastes tu contraseña?</a>
      </div>
    </main>
    
    <script src="assets/js/vendor/jquery.min.js"></script>
    <!--<script src="assets/js/flat-ui.min.js"></script>-->
    <script src="assets/js/application.js"></script>
    <script>
    ;(function() {
      var $email = $("#login-email")
      var $pass = $("#login-pass")

      $("#login-btn").on("click", loginHandle)

      function loginHandle (e) {
        e.preventDefault()
        if(validarLogin()){
          $.ajax({
            type: "POST",
            url: "service/login.php",
            data: { email: $email.val(), password: $pass.val() }
          })
          .done(function (snap) {
            console.log(snap)
            if(snap === "2"){
              toast("Ha iniciado sesión")
              location.reload()
            }
            else toast("Usuario no existe!")

          })
        }
      }

      function validarLogin() {
        if($email.val() === ""){
          toast("Porfavor ingrese su e-mail")
          $email.focus()
          return false
        }
        if($pass.val() === ""){
          toast("Porfavor ingrese su contraseña")
          $pass.focus()
          return false
        }
        else return true
      }

    })()
    </script>
  </body>
</html>
