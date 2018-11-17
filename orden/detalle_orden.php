<?php 
$title='Eshop-Detalle Orden';
$tituloPagina = 'Detalle Orden';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
$id_carro = filter_input(INPUT_GET, 'id_carro', FILTER_SANITIZE_STRING);
/*
<button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-arrow-left"></span> Left
        </button>
*/
/*
 <th>FECHA <div style="display: inline-block; float: right;"><?php echo "<a style='font-size: 11px;' class='btn btn-primary' role='button' href='./index.php'> Atras </a>" ?></div></th>
*/

 ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_categoria.css">

<form>
  <table class="table table-hover table-sm" style="text-align: center; margin-top: 0%;" border="1">
    <thead class="table_head">
        <tr>
          <th class="align-middle" style="text-align:center;">CARRO</th>
          <th class="align-middle" style="text-align:center;">USUARIO</th>
          <th class="align-middle" style="text-align:center;">PRODUCTO</th>
          <th class="align-middle" style="text-align:center;">PRECIO</th>
          <th style="text-align:center;">FECHA <div style="display: inline-block; float: right;"><?php echo "<a href='./index.php' style='font-size: 11px;' class='btn btn-primary btn-lg'>
                        <span class='glyphicon glyphicon-arrow-left'></span> Atrás
                        </a>" ?>     
                    </div> 
          </th>
        </tr>
    </thead>
        <?php 
  	      	$lista_orden_detalle = $orden_modelo->listaOrdenesPorCarro($id_carro);
            if(!empty($lista_orden_detalle))
            {
    	        foreach ($lista_orden_detalle as $orden) {
    	            echo "<tr>";
    	            echo "<td>" . $orden['id_carro'] . "</td>";
                  echo "<td>" . $orden['id_usuario'] . "</td>";
    	            echo "<td>" . $orden['nombre'] . "</td>";
                  echo "<td>" . $orden['precio_producto'] . "</td>";
                  echo "<td>" . $orden['fecha'] . "</td>";
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