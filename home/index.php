<?php 
$title='Eshop-Home';
$tituloPagina = 'Home';
require_once '../shared/header.php';
require_once '../shared/sessions.php';
require_once '../shared/menu.php';
require_once '../seguridad/verificar_session.php';
require_once '../shared/db.php';
$cantidadProductosUsuario = $orden_modelo->cantidadDeProductosAdquiridosUsuario($_SESSION['usuario']['id_usuario']) ?? 0;
$montoTotalComprasUsuario = $orden_modelo->montoTotalComprasUsuario($_SESSION['usuario']['id_usuario']) ?? 0;
$totalClientesRegistrados = $usuario_modelo->cantidadClientesRegistrados() ?? 0;
$cantidadProductosVendidos = $orden_modelo->cantidadProductosVendidos() ?? 0;
$totalEnVentas = $orden_modelo->totalEnVentas() ?? 0;
/*
if(isset($_POST['btn_stock']))
{
  $min_stock = $_POST['stock'] ?? '';
  //echo $min_stock;
  //shell_exec('/path/to/python /path/to/your/check_stock.py ' . $hello);
  //shell_exec('../check_stock.py ' . $min_stock);
}
//require_once __DIR__ . '/../Db/PgConnection.php';


<form action="fichero.py/funcion" method="post">
<p>Tu nombre: <input type="text" name="nombre" value=""/></p>
<p><input type="submit" value="OK"/></p>
</form>
*/
 ?>


<div class="row">
  <form action="#" method="POST">
    <div class="col-sm-3">
      <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="../assets/imagenes/informacion.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Estadísticas</h5>
            <p class="card-text">Estimad@ <?php echo $_SESSION['usuario']['nombre'] ?>, siempre mejorando tiempos en entregas</p>
          </div>
          <?php if($_SESSION['usuario']['rol'] == 'cliente')
          { ?>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Total de productos adquiridos: <?php echo $cantidadProductosUsuario ?></li>
              <li class="list-group-item">Monto total en compras: $<?php echo $montoTotalComprasUsuario ?></li>
              <li class="list-group-item" style="text-align: center;"><img src="../assets/imagenes/informacion_pequenno.svg" width="40" height="40" alt=""><strong>Eshop</strong></li>
            </ul>
          <?php }else{ ?>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Cant. Clientes: <?php echo $totalClientesRegistrados ?></li>
                      <li class="list-group-item">Cant. Productos vendidos: <?php echo $cantidadProductosVendidos ?></li>
                      <li class="list-group-item">Total en ventas: $<?php echo $totalEnVentas ?></li>
                      <li class="list-group-item">Stock: <input type="number" style="width: 90px;" name="stock"><button name="btn_stock" type="submit">OK</button></li>
                      <li class="list-group-item" style="text-align: center;"><img src="../assets/imagenes/informacion_pequenno.svg" width="40" height="40" alt=""><strong>Eshop</strong></li>
                    </ul>
                <?php
                 }?>
      </div>
    </div>
  </form>
  <div class="col-sm-8">
      <div class="card">
        <ul class="list-group list-group-flush">
          <li class="list-group-item" style="text-align: center;"><h4>LISTA DE PRODUCTOS ADQUIRIDOS</h4></li>
        </ul>
        <table class="table" style="text-align: center; margin-top: 0%;">
            <thead>
                <tr>
                  <th>NOMBRE</th>
                  <th>DESCRIPCIÓN</th>
                  <th>IMAGEN</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $codigosProductosUsuario = $producto_modelo->codigoProductosUsuario($_SESSION['usuario']['id_usuario']);
                    //var_dump($codigosProductosUsuario);
                    if(!empty($codigosProductosUsuario))
                    {
                      for ($i=0; $i < count($codigosProductosUsuario); $i++) {
                          $producto = $producto_modelo->encontrarProducto($codigosProductosUsuario[$i]['id_producto']);
                          $imagen = $producto_modelo->encontrarImagenIdProducto($codigosProductosUsuario[$i]['id_producto']);
                          //var_dump($imagen);
                          echo "<tr>";
                          echo "<td>" . $producto['nombre'] . "</td>";
                          echo "<td>" . $producto['descripcion'] . "</td>";
                          $data = $imagen['imagen'];
                          $img = "<img width='20%' src= 'data:image/jpeg;base64, $data' />";
                          echo "<td>" . $img . "</td>";
                          echo "</tr>";
                      }
                   }

                 ?>
            </tbody>
          </table>
      </div> 
  </div>

</div>






 <?php
 require_once '../shared/footer.php';
  ?>