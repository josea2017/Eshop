<?php 

require_once '../shared/sessions.php';
require_once '../shared/db.php';
$usuario = $_POST['usuario'] ?? null;
$contrasenna = $_POST['contrasenna'] ?? null;

if($usuario && $contrasenna){

  //$resultado = $usuario_modelo->listarUsuarios();
  //var_dump($resultado);
  $resultado = $usuario_modelo->buscarUsuarioLogin($usuario);
  /*
  foreach ($resultado as $fila) {
    if($fila['id_usuario'] == $usuario && $fila['contrasenna'] == $contrasenna)
    {
      $_SESSION['usuario'] = $fila;
      //echo $_SESSION['usuario']['id_usuario'];
     // header("Location: ../home/index.php");
      echo "true";
    }else{
      echo "false";
    }

  }*/
  if($resultado['id_usuario'] == $usuario && $resultado['contrasenna'] == md5($contrasenna))
  { 
    $_SESSION['usuario'] = $resultado;
    echo "true";
  }else{
    echo "false";
  }
} else {
  echo "false";
}


 ?>