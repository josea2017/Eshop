$(document).ready(function() {


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
      var usuario = $("#usuario").val();
      var contrasenna = $("#contrasenna").val();
      var confirm_contrasenna = $("#confirm_contrasenna").val();
      $.ajax({
        url: "../seguridad/registroValidar.php",
        success: function (result) {
          if (result.trim() == "true") {
            document.location.href = "../seguridad/login.php";
            //document.location.href = "../home/index.php";
            //$("#resultado_registro_positivo").html('<div class="alert alert-success" role="alert" id>Registro exitoso.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          } else {
            $("#resultado_registro_negativo").html('<div class="alert alert-danger" role="alert" id>No se logró, contraseñas diferentes o usuario ya existe.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          }
        },
        data: {
          nombre: nombre,
          apellidos: apellidos,
          telefono: telefono,
          correo: correo,
          direccion: direccion,
          rol: rol,
          usuario: usuario,
          contrasenna: contrasenna,
          confirm_contrasenna: confirm_contrasenna
        },
        type: "POST"
      });
    })

/*
$nombre = $_POST['nombre'] ?? null;
$apellidos = $_POST['apellidos'] ?? null;
$telefono = $_POST['telefono'] ?? null;
$correo = $_POST['correo'] ?? null;
$direccion = $_POST['direccion'] ?? null;
$rol = "cliente";
$usuario = $_POST['usuario'] ?? null;
$contrasenna = $_POST['contrasenna'] ?? null;
$confirm_contrasenna = $_POST['confirm_contrasenna'] ?? null;
*/
});
