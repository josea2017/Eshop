<?php 
$title='Eshop-Ordenes';
$tituloPagina = 'Ordenes';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';

 ?>
 <link rel="stylesheet" type="text/css" href="../assets/css/style_index_categoria.css">

<form>
  <table class="table table-hover table-sm" style="text-align: center; margin-top: 0%;" border="1">
    <thead class="table_head">
        <tr>
          <th>CARRO</th>
          <th>FECHA</th>
          <th>TOTAL $</th>
          <th>DETALLE</th>
        </tr>
    </thead>
        <?php 
  	      	$lista_ordenes_usuario = $orden_modelo->listaOrdenesPorUsuario($_SESSION['usuario']['id_usuario']);
            if(!empty($lista_ordenes_usuario))
            {
    	        foreach ($lista_ordenes_usuario as $orden) {
    	            echo "<tr>";
    	            echo "<td>" . $orden['id_carro'] . "</td>";
    	            echo "<td>" . $orden['fecha'] . "</td>";
                  echo "<td>" . $orden['sum'] . "</td>";
                  echo "<td>" .
                          "<a style='font-size: 15px;' class='btn btn-primary' role='button' href='./detalle_orden.php?id_carro=" . $orden['id_carro'] . "'>Detalle</a>".
                       "</td>";
    	            echo "</tr>";
    	        }
           }//class="btn btn-primary"
            /*
                <a style='font-size: 15px;' class='btn btn-primary' role='button' href='./detalle_producto.php?id_producto=" . $lista_productos[$i]['id_producto'] . "'>Detalle</a>
            */
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