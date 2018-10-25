<?php 
$title='Eshop-Adm Categorias';
$tituloPagina = 'Adm Categorias';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../modelos/Categoria.php';
 ?>

<table class="table table-hover" style="text-align: center; margin-top: 3%;" border="1">
      <tr>
        <th>ID CATEGORIA</th>
        <th>NOMBRE</th>
        <th><input type="submit" style="font-size: 15px;" class="btn btn-success"  value="Categoria nueva" name="categoria_nueva"></th>
      </tr>
      <?php 
          $categoria_modelos = new Categoria();
	      	$lista_categorias = $categoria_modelos->listarTodasCategorias();
          if(!empty($lista_categorias))
          {
  	        foreach ($lista_categorias as $categoria) {
  	            echo "<tr>";
  	            echo "<td>" . $categoria['id_categoria'] . "</td>";
  	            echo "<td>" . $categoria['nombre'] . "</td>";
                echo "<td>" .
                   "<a style='font-size: 15px;' class='btn btn-primary' role='button' href='?id=" . $categoria['id_categoria'] . "'>Editar</a>".
                   " <a style='font-size: 15px;' class='btn btn-danger' role='button' href='?id=" . $categoria['id_categoria'] . "'>Borrar</a>".
                  "</td>";
  	            echo "</tr>";
  	        }
         }//class="btn btn-primary"

       ?>
</table>



 <?php
 require_once '../shared/footer.php';
  ?>