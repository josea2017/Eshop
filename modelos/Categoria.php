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
    public function validarRegistro($id_categoria, $nombre)
    {
      $resultado = false;
      if($this->validarCodigoDisponible($id_categoria)){
        $resultado = true;
        $this->insertar($id_categoria, $nombre);
      }
      return $resultado;    
    }
    public function validarCodigoDisponible($id_categoria){
      $resultado = false;
      $contador = 0;

      $con = new PgConnection('localhost', '5432', 'jose', '12345', 'eshop');
      $con->connect();

      $resultado_db = null;
      $resultado_db = $con->runQuery("SELECT * FROM categorias WHERE id_categoria = '$id_categoria'");

      if(empty($resultado_db)){
        $resultado = true;
      }

      return $resultado;  
    }
    public function insertar($id_categoria, $nombre)
    {
        
      $sql = "INSERT INTO categorias(id_categoria, nombre) VALUES ('$id_categoria','$nombre')";
      $con = new PgConnection('localhost', '5432', 'jose', '12345', 'eshop');
      $con->connect();
      $con->runStatement($sql);
        
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