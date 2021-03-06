<?php

namespace Modelos{
class Usuario
  {
    private $connection;
    function __construct($connection){
        $this->connection = $connection;
    }

    public function listarUsuarios(){
        $result = $this->connection->runQuery('SELECT * FROM usuarios');
          return $result;
    }

    public function buscarUsuarioLogin($usuario){
        $result = null;
        $result = $this->connection->runQuery('SELECT * FROM usuarios WHERE id_usuario = $1', [$usuario])[0];
        return $result;

    }

    public function validarRegistro($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna)
    {
    	$resultado = false;
    	/*
    	if($this->validarRegistroDatosCompletos($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna, $confirm_contrasenna)){
    		$resultado = true;
    	}*/
    	if($this->validarRegistroDatosCompletos($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna) && $this->validarRegistroUsuarioDisponible($usuario)){
    		$resultado = true;

            $this->insertar($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna);
    	}
    	return $resultado;    
    }

     public function validarRegistroDatosCompletos($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna)
    {
    	$resultado = false;
    	
    	if($nombre != '' && $apellidos != '' && $telefono != '' && $correo != '' && $direccion != '' && $rol != '' && $usuario != '' && $contrasenna != '')
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
	    

	        $resultado_db = null;
	        $resultado_db = $this->connection->runQuery("SELECT * FROM usuarios WHERE id_usuario = '$usuario'");
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

    public function insertar($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna)
    {
      /*
            $sql = "INSERT INTO usuarios(email, password) VALUES ($1, md5($2))";
            $this->connection->runStatement($sql, [$email, $password]);
      */
      $sql = "INSERT INTO usuarios(nombre, apellidos, telefono, correo, direccion, rol, id_usuario, contrasenna) VALUES ('$nombre','$apellidos', '$telefono', '$correo', '$direccion', '$rol', '$usuario', md5('$contrasenna'))";
      $this->connection->runStatement($sql);
    }

    public function cantidadClientesRegistrados()
    {
        $cantidad = $this->connection->runQuery("SELECT COUNT(id_usuario) FROM usuarios WHERE rol = 'cliente'")[0];
        $cantidad = $cantidad['count'];
        return $cantidad;
    }
    

  }
}
 
