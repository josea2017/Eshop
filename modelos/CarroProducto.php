<?php

namespace Modelos{
class CarroProducto
  {
    private $connection;
    function __construct($connection){
      $this->connection = $connection;
    }

    public function validarStock($id_producto)
    {
      $respuesta = false;
      $cantidad = $this->connection->runQuery('SELECT stock FROM productos WHERE id_producto = $1', [$id_producto])[0];
      $cantidad = $cantidad['stock'];
      if($cantidad > 0){
        $respuesta = true;
      }
      return $respuesta;
    }

    public function insertarLinea($id_carro, $id_usuario, $id_producto)
    {
      $this->connection->runStatement('INSERT INTO carros_productos(id_carro, id_usuario, id_producto) VALUES ($1, $2, $3)', [$id_carro, $id_usuario, $id_producto]);

    }
    
    public function ultimoCarroDeUsuario($id_usuario){
      //return $this->connection->runQuery('SELECT * FROM productos WHERE id_producto = $1', [$id_producto])[0];
      //SELECT MAX(id_carro) FROM carros WHERE id_usuario = 'josea3712';
      //retorna el máximo id de la tabla carros del usuario que ingresa por parametro
      return $this->connection->runQuery('SELECT MAX(id_carro) FROM carros_productos WHERE id_usuario = $1', [$id_usuario])[0];

    }

    public function listaCarrosProductosPorIdCarro($id_carro)
    {
      return $this->connection->runQuery('SELECT * FROM carros_productos WHERE id_carro = $1', [$id_carro]);
    }

    public function eliminar($id_carro, $id_producto)
    {
      $this->connection->runStatement('DELETE FROM carros_productos WHERE id_carro = $1 AND id_producto = $2', [$id_carro, $id_producto]);
    }

    public function eliminarCarrosProductosIdCarro($id_carro)
    {
      $this->connection->runStatement('DELETE FROM carros_productos WHERE id_carro = $1', [$id_carro]);
    }

    public function eliminarTodo()
    {
      $this->connection->runStatement('DELETE FROM carros_productos');

    }

  }
}