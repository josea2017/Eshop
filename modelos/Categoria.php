<?php
require_once '../db/PgConnection.php';

class Categoria
  {

    function __construct(){}

    public function listarTodasCategorias(){

        $con = new PgConnection('localhost', '5432', 'jose', '12345', 'eshop');
        $con->connect();
        $sql = "SELECT * FROM categorias ORDER BY id ASC";
        $resultado = $con->runQuery($sql);
        return $resultado; 
    }

    public function insertar($nombre, $apellidos, $telefono, $correo, $direccion, $rol, $usuario, $contrasenna)
    {
        /*
      $sql = "INSERT INTO usuarios(nombre, apellidos, telefono, correo, direccion, rol, id_usuario, contrasenna) VALUES ('$nombre','$apellidos', '$telefono', '$correo', '$direccion', '$rol', '$usuario', '$contrasenna')";
      $con = new PgConnection('localhost', '5432', 'jose', '12345', 'eshop');
      $con->connect();
      $con->runStatement($sql);
        */
    }
    

  }
 
/*
public function listarTodosDepartamentos()
        {
            $sql = "SELECT * FROM departamentos ORDER BY id_departamento ASC";
            $result = $this->connection->executeSql($sql);
            return $this->connection->getResults($result);
        }
*/