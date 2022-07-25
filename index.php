<?php
//Rutas
require_once __DIR__ . '/bootstrap/init.php';
require_once RUTA_RAIZ . '/bootstrap/routes.php';
//obtener rutas
$rutas = getRutasSitio();
//Verificar valor s por GET
$seccion = $_GET['s'] ?? 'home';

// Valido las secciones
if(!isset($rutas[$seccion])) {
    $seccion = "404";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lámparas Zelux <?= $rutas[$seccion]['title'];?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header class="container fondo3">

    <h1 id="logo">Zelux</h1>
    <!-- Barra de navegacion-->
    <div class="row">

        <nav class="col navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <button class="navbar-toggler ml-auto"
                    type="button"
                    data-toggle="collapse"
                    data-target="#barra"
                    aria-controls="barra"
                    aria-expanded="false"
                    aria-label="Menú Hamburguesa">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="barra">
                <ul class="navbar-nav text-center ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?s=productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?s=contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    </header>
    <!--Seccion-->
    <main class="content container">
        <?php

        require __DIR__ . '/secciones/' . $seccion . '.php';
        ?>
    </main>

	<footer>
		<ul>
			<li><a href="#"><img src="imgs/facebook.png" alt="facebook icono"></a></li>
			<li><a href="#"><img src="imgs/instagram.png" alt="instagram icono"></a></li>
			<li><a href="#"><img src="imgs/twitter.png" alt="twitter icono"></a></li>
			
		</ul>
		<p>Bryan scalzo, Programacion II, DWTN2A, 2021</p>
    </footer>
    
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>