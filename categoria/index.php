<?php 
$title='Eshop-Adm Categorias';
$tituloPagina = 'Adm Categorias';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
 ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_categoria.css">

<form method="POST">
  <table class="table table-hover table-sm" style="text-align: center; margin-top: 0%;" border="1">
    <thead class="table_head">
        <tr>
          <th>ID CATEGORIA</th>
          <th>NOMBRE</th>
          <th><a class="btn btn-success" name="categoria_nueva" href="./nuevo.php">Categoria nueva</a></th>
        </tr>
    </thead>
        <?php 
  	      	$lista_categorias = $categoria_modelo->listarTodasCategorias();
            if(!empty($lista_categorias))
            {
    	        foreach ($lista_categorias as $categoria) {
    	            echo "<tr>";
    	            echo "<td>" . $categoria['id_categoria'] . "</td>";
    	            echo "<td>" . $categoria['nombre'] . "</td>";
                  echo "<td>" .
                     "<a style='font-size: 15px;' class='btn btn-primary' role='button' href='./editar.php'?id=" . $categoria['id_categoria'] . "'>Editar</a>".
                     " <a style='font-size: 15px;' class='btn btn-danger' role='button' href='?id=" . $categoria['id_categoria'] . "'>Borrar</a>".
                    "</td>";
    	            echo "</tr>";
    	        }
           }//class="btn btn-primary"

         ?>
  </table>
</form>


 <?php
 //677172
 require_once '../shared/footer.php';
  ?>