<?php
require_once '../db/PgConnection.php';

class Usuario
  {
  	private $connection;
    function __construct(){}

    public function validarRegistro($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna, $confirm_contrasenna)
    {
    	$resultado = false;
    	/*
    	if($this->validarRegistroDatosCompletos($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna, $confirm_contrasenna)){
    		$resultado = true;
    	}*/
    	if($this->validarRegistroUsuarioDisponible($usuario)){
    		$resultado = true;
    	}
    	return $resultado;    
    }

     public function validarRegistroDatosCompletos($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna, $confirm_contrasenna)
    {
    	$resultado = false;
    	
    	if($nombre != '' && $apellidos != '' && $telefono != '' && $correo != '' && $direccion != '' && $rol != '' && $usuario != '' && $contrasenna != '' && $confirm_contrasenna != '')
    	{
    		$resultado = true;
    	}
    	return $resultado;      
    }

    public function validarRegistroUsuarioDisponible($usuario)
    {
    	$resultado = false;
    	$contador = 0;

    	if($usuario != '')
    	{
	    	$con = new PgConnection('localhost', '5432', 'jose', '12345', 'eshop');
	        $con->connect();
	        $resultado_db = null;
	        $resultado_db = $con->runQuery("SELECT * FROM usuarios WHERE id_usuario = '$usuario'");
		    /*foreach ($resultado_db as $usuario) {
		        $contador++;
		     }
	    
	        if($contador >= 1){
	        	$resultado = false;
	        }*/
	        if(empty($resultado_db)){
	        	$resultado = true;
	        }
	        //echo $con->runQuery("SELECT * FROM usuarios WHERE id_usuario = '$usuario'");
        }

    	return $resultado;  
    }

    

  }
 
