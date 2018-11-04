<?php 
$title='Eshop-Catálogo';
$tituloPagina = 'Catálogo';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';

 ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_categoria.css">

<!--<div class="container">-->
<form>
  <table class="table table-hover table-sm" style="text-align: center; margin-top: 0%;" border="1">
    <thead class="table_head">
        <tr>
          <th>ID CATEGORÍA</th>
          <th>NOMBRE CATEGORÍA</th>
          <th>OBSERVAR</th>
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
                     " <a style='font-size: 15px;' class='btn btn-primary' role='button' href='./catalogo_productos.php?id_categoria=" . $categoria['id_categoria'] . "'>Observar</a>".
                    "</td>";
    	            echo "</tr>";
    	        }
           }//class="btn btn-primary"

         ?>
  </table>
</form>
<!--</div>-->

 <?php
/*<input type="text" name="nombre" autofocus placeholder="Nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>">*/
/*<a href="http://url.pagina.destino/?variable1=valor1&variable2=valor2">Enlace a página de destino</a>*/
 //677172
 require_once '../shared/footer.php';
  ?>