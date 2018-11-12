<?php 
require_once '../shared/header.php';
require_once '../modelos/Usuario.php';
require_once '../shared/db.php';

$nombre = $_POST['nombre'] ?? null;
$apellidos = $_POST['apellidos'] ?? null;
$telefono = $_POST['telefono'] ?? null;
$correo = $_POST['correo'] ?? null;
$direccion = $_POST['direccion'] ?? null;
$rol = $_POST['rol'] ?? null;
$usuario = $_POST['usuario'] ?? null;
$contrasenna = $_POST['contrasenna'] ?? null;
$confirm_contrasenna = $_POST['confirm_contrasenna'] ?? null;

if($contrasenna != null && $confirm_contrasenna != null)
{
  if($contrasenna == $confirm_contrasenna)
  {
    if($usuario_modelo->validarRegistro($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna)){
      echo "true";
    }else{
      echo "false";
    }
  }else{
    echo "false";
  }
}

?>