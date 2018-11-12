$(document).ready(ini);

function ini() {

      $('#btn_login').on('click', function() {

      var usuario = $("#usuario").val();
      var contrasenna = $("#contrasenna").val();
      $.ajax({
        url: "../seguridad/loginValidar.php",
        success: function (result) {
          if (result.trim() == "true") {
            document.location.href = "../home/index.php";
          } else {
            $("#resultado").html('<div class="alert alert-danger" role="alert" id>El usuario o contraseña incorrecta, intenta de nuevo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          }
        },
        data: {
          usuario: usuario,
          contrasenna: contrasenna
        },
        type: "POST"
      });
    })

    $('#btn_registro').on('click', function() {

      var nombre = $("#nombre").val();
      var apellidos = $("#apellidos").val();
      var telefono = $("#telefono").val();
      var correo = $("#correo").val();
      var direccion = $("#direccion").val();
      var rol = $("#rol").val();
      var contrasenna = $("#contrasenna").val();
      var confirm_contrasenna = $("#confirm_contrasenna").val();
      $.ajax({
        url: "../seguridad/registroValidar.php",
        success: function (result) {
          if (result.trim() == "true") {
            document.location.href = "../home/index.php";
          } else {
            $("#resultado").html('<div class="alert alert-danger" role="alert" id>El usuario o contraseña incorrecta, intenta de nuevo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          }
        },
        data: {
          usuario: usuario,
          contrasenna: contrasenna
        },
        type: "POST"
      });
    })







}