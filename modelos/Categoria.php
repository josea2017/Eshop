<?php

namespace Modelos{
class Categoria
  {
    private $connection;
    function __construct($connection){
      $this->connection = $connection;
    }

    public function listarTodasCategorias(){

        $sql = "SELECT * FROM categorias ORDER BY id ASC";
        $resultado = $this->connection->runQuery($sql);
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

      $resultado_db = null;
      $resultado_db = $this->connection->runQuery("SELECT * FROM categorias WHERE id_categoria = '$id_categoria'");

      if(empty($resultado_db)){
        $resultado = true;
      }

      return $resultado;  
    }
    public function insertar($id_categoria, $nombre)
    {
        
      $sql = "INSERT INTO categorias(id_categoria, nombre) VALUES ('$id_categoria','$nombre')";
      $this->connection->runStatement($sql);
        
    }

    public function editar($id_categoria, $nombre){
      $sql = "UPDATE categorias SET id_categoria = '$id_categoria', nombre = '$nombre' WHERE id_categoria = '$id_categoria'";
      $this->connection->runStatement($sql);

    }

    public function eliminar($id_categoria){
        $permiso = false;
        if($this->verificarCategoriaProductosEliminar($id_categoria)){
          $sql = "DELETE FROM categorias WHERE id_categoria = '$id_categoria'";
          $this->connection->runStatement($sql);
          $permiso = true;
      }
      return $permiso;
    }
    public function verificarCategoriaProductosEliminar($id_categoria){
      $permiso = false;

      $sql = "SELECT * FROM productos WHERE id_categoria = '$id_categoria'";
      $resultado_db = null;
      $resultado_db = $this->connection->runQuery($sql);
      if(empty($resultado_db)){
        $permiso = true;
      }
      return $permiso; 
    }
    

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