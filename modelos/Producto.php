<?php

namespace Modelos{
class Producto
  {
    private $connection;
    function __construct($connection){
      $this->connection = $connection;
    }

    public function rebajarDeStock($id_producto)
    {
       $cantidad = $this->connection->runQuery('SELECT stock FROM productos WHERE id_producto = $1', [$id_producto])[0];
       $cantidad = $cantidad['stock'];
       $cantidad--;
       $sql = "UPDATE productos SET stock = '$cantidad' WHERE id_producto = '$id_producto'";
       $this->connection->runStatement($sql);
       //return $cantidad;
    }


    public function listarProductosIdProducto($id_producto)
    {
      return $this->connection->runQuery('SELECT * FROM productos WHERE id_producto = $1', [$id_producto])[0];
    }

    public function listarImagenesIdProducto($id_producto)
    {
      $res = "SELECT encode(imagen, 'base64') AS imagen FROM productos WHERE id_producto = '$id_producto'";
      $resultado = $this->connection->runQuery($res)[0];
      return $resultado;
      //return $resultado; 
      //return $this->connection->runQuery('SELECT encode(imagen, base64) AS imagen FROM productos WHERE id_producto = $1', [$id_producto])[0];
    }

    public function listarTodasImagenes()
    {
      //$sql = "SELECT * FROM imagenes ORDER BY id ASC";
      //$result = $this->connection->executeSql($sql);
      //return $this->connection->getResults($result);
      //$res = "SELECT encode(imagen, 'base64') AS imagen FROM imagenes WHERE id='1'";
      /*$res = "SELECT encode(imagen, 'base64') AS imagen FROM productos";
      $resultado = $this->connection->runQuery($res);
      return $resultado; */
      $res = "SELECT encode(imagen, 'base64') AS imagen FROM productos ORDER BY id ASC";
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

    public function encontrarProducto($id_producto)
    {
       return $this->connection->runQuery('SELECT * FROM productos WHERE id_producto = $1', [$id_producto])[0];
    }

    public function listarTodosProductos(){
      //SELECT * FROM public.productos ORDER BY id ASC 
      /*
        $sql = "SELECT * FROM productos ORDER BY id ASC";
        $resultado = $this->connection->runQuery($sql);
        return $resultado; 
        */
        $sql = "SELECT * FROM productos ORDER BY id ASC";
        $resultado = $this->connection->runQuery($sql);
        return $resultado;

    }

    public function listarProductosPorIdCategoria($id_categoria)
    {
       return $this->connection->runQuery('SELECT * FROM productos WHERE id_categoria = $1', [$id_categoria]);
    }

    public function listarImagenesProductosPorIdCategoria($id_categoria)
    {
      $res = "SELECT encode(imagen, 'base64') AS imagen FROM productos WHERE id_categoria = '$id_categoria'";
      $resultado = $this->connection->runQuery($res);
      return $resultado; 
    }

    public function listarImagenesProductosPorIdProducto($id_producto)
    {
      $res = "SELECT encode(imagen, 'base64') AS imagen FROM productos WHERE id_producto = '$id_producto'";
      $resultado = $this->connection->runQuery($res);
      return $resultado; 
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

    public function eliminar($id_producto){
          $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
          $this->connection->runStatement($sql);
    }

    public function codigoProductosUsuario($id_usuario)
    {
      return $this->connection->runQuery('SELECT id_producto FROM ordenes WHERE id_usuario = $1', [$id_usuario]);
    }

    public function encontrarImagenIdProducto($id_producto)
    {
      //return $this->connection->runQuery('SELECT * FROM productos WHERE id_producto = $1', [$id_producto])[0];
      $res = "SELECT encode(imagen, 'base64') AS imagen FROM productos WHERE id_producto = '$id_producto'";
      $resultado = $this->connection->runQuery($res)[0];
      return $resultado; 
    }
   
    

  }
}