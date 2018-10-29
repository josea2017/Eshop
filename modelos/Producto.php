<?php

namespace Modelos{
class Producto
  {
    private $connection;
    function __construct($connection){
      $this->connection = $connection;
    }

    public function listarTodasImagenes()
    {
      //$sql = "SELECT * FROM imagenes ORDER BY id ASC";
      //$result = $this->connection->executeSql($sql);
      //return $this->connection->getResults($result);
      //$res = "SELECT encode(imagen, 'base64') AS imagen FROM imagenes WHERE id='1'";
      $res = "SELECT encode(imagen, 'base64') AS imagen FROM productos";
      $resultado = $this->connection->runQuery($res);
      return $resultado; 
    }

    public function validarCodigoDisponible($id_producto){
      $resultado = false;
      $contador = 0;

      $resultado_db = null;
      $resultado_db = $this->connection->runQuery("SELECT * FROM productos WHERE id_producto = '$id_producto'");

      if(empty($resultado_db)){
        $resultado = true;
      }

      return $resultado;  
    }

    public function listarTodosProductos(){

        $sql = "SELECT * FROM productos ORDER BY id ASC";
        $resultado = $this->connection->runQuery($sql);
        return $resultado; 
        /*
          $res = "SELECT encode(imagen, 'base64') AS imagen FROM imagenes";
      $result = $this->connection->executeSql($res);
      return  $this->connection->getResults($result);
        */
    }

    public function insertar($id_producto, $nombre, $descripcion, $imagen, $stock, $precio, $id_categoria){
      $escaped = pg_escape_bytea($imagen);
      $sql = "INSERT INTO productos(id_producto, nombre, descripcion, imagen, stock, precio, id_categoria) VALUES ('$id_producto','$nombre', '$descripcion', '{$escaped}', '$stock', '$precio', '$id_categoria')";
      $this->connection->runStatement($sql);
    }

    public function editar($id_producto, $nombre, $descripcion, $stock, $precio){
      $sql = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', stock = '$stock', precio = '$precio' WHERE id_producto = '$id_producto'";
      $this->connection->runStatement($sql);
    }
   
    

  }
}