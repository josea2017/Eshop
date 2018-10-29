<link rel="stylesheet" type="text/css" href="../assets/css/style_menu.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav_principal">
  <a class="navbar-brand" href="#"><?=$tituloPagina?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 60%;">
    <ul id="menu_opciones" class="navbar-nav mr-auto">
        <?php
        $menu = [
          'Home' => '../home/index.php',
          'Categorias' => '../categoria/index.php',
          'Productos' => '../producto/index.php', 
          //'Salir' => '../seguridad/login.php',
        ];

            echo "<label id='nombre_usuario' style='margin-top: 3%;''>".$_SESSION['usuario']['nombre']."|</label>";
        foreach ($menu as $key => $value) {
            echo "<li class='nav-item'>
                    <a class='nav-link' href='$value'>$key</a>
                  </li>";
        }
            echo "<li class='nav-item'>
                    <a class='nav-link' href='../seguridad/logout.php'>Salir</a>
                  </li>";
        ?>
    </ul>
  </div>
</nav>
