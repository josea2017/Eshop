<?php

namespace Modelos{
class Carro
  {
    private $connection;
    function __construct($connection){
      $this->connection = $connection;
    }

    public function nuevo_insertar($id_usuario)
    {
      $this->connection->runStatement('INSERT INTO carros(id_usuario) VALUES ($1)', [$id_usuario]);

    }

    public function ultimoCarroDeUsuario($id_usuario){
      //return $this->connection->runQuery('SELECT * FROM productos WHERE id_producto = $1', [$id_producto])[0];
      //SELECT MAX(id_carro) FROM carros WHERE id_usuario = 'josea3712';
      //retorna el máximo id de la tabla carros del usuario que ingresa por parametro
      return $this->connection->runQuery('SELECT MAX(id_carro) FROM carros WHERE id_usuario = $1', [$id_usuario])[0];

    }
    

  }
}