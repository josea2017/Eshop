<?php

namespace Modelos{
class Orden
  {
      private $connection;
      function __construct($connection){
        $this->connection = $connection;
      }

      public function insertarLineaOrden($id_carro, $id_usuario, $id_producto, $precio_producto, $fecha)
      {
        $this->connection->runStatement('INSERT INTO ordenes(id_carro, id_usuario, id_producto, precio_producto, fecha) VALUES ($1, $2, $3, $4, $5)', [$id_carro, $id_usuario, $id_producto, $precio_producto, $fecha]);

      }

      public function buscarOrdenPorIdCarro($id_carro)
      {
         $orden = null;
         $orden = $this->connection->runQuery('SELECT * FROM ordenes WHERE id_carro = $1', [$id_carro])[0];
         return $orden;
      }

      public function verificarIdCarroDisponible($id_carro)
      {
        $disponible = true;
        $dato = null;
        $dato = $this->connection->runQuery('SELECT id_carro FROM ordenes WHERE id_carro = $1', [$id_carro]);
        if($dato != null)
        {
          $disponible = false;
        }
        return $disponible;
      }
    
   
  }

}