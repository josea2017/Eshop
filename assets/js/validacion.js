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
        $("#resultado").html('<div class="alert alert-danger" role="alert">El usuario o contraseña incorrecta, intenta de nuevo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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