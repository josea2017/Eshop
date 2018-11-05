<?php
  require_once '../shared/sessions.php';
  require_once '../shared/db.php';
  $carroProducto_modelo->eliminarTodo();
  session_destroy();
  header("Location: ./login.php");
?>