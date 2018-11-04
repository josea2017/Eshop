<?php

require_once __DIR__ . '/../Db/PgConnection.php';
require_once __DIR__ . '/../Modelos/Usuario.php';
require_once __DIR__ . '/../Modelos/Categoria.php';
require_once __DIR__ . '/../Modelos/Producto.php';
require_once __DIR__ . '/../Modelos/Carro.php';

use Db\PgConnection;
$con = new PgConnection('localhost', '5432', 'jose', '12345','eshop');
$con->connect();

$usuario_modelo = new Modelos\Usuario($con);
$categoria_modelo = new Modelos\Categoria($con);
$producto_modelo = new Modelos\Producto($con);
$carro_modelo = new Modelos\Carro($con);


