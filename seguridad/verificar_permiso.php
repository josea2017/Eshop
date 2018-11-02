<?php

//session_start();
if ($_SESSION['usuario']['rol'] == 'cliente') {
  	header("Location: ../seguridad/mensaje_permiso.php");
  
}