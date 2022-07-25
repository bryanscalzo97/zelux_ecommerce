<?php
require_once __DIR__ . '/../bootstrap/init.php';
require_once RUTA_RAIZ . '/bootstrap/routes.php';

$rutas = getRutasAdmin();

$vista = $_GET['s'] ?? 'login';

if(!isset($rutas[$vista])) {
    $vista = '404';
}

// Instanciamos la clase de Autenticación
$autenticacion = new Autenticacion();

//Verificar autenticacion
$requiereAutenticacion = $rutas[$vista]['autenticacion'] ?? false;
if($requiereAutenticacion && !$autenticacion->estaAutenticado()) {

    $_SESSION['mensaje_error'] = "Esta acción requiere de haber iniciado sesión.";
    header("Location: index.php?s=login");
    exit;
}


$mensajeExito = $_SESSION['mensaje_exito'] ?? null;
$mensajeError = $_SESSION['mensaje_error'] ?? null;
unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Administración Zelux :: <?= $rutas[$vista]['title'];?></title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

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
                    <li class="nav-item invisible">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item invisible">
                        <a class="nav-link" href="index.php?s=productos">Productos</a>
                    </li>
                    <?php
                    if($autenticacion->estaAutenticado()):
                        ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?s=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?s=productos">Productos</a></li>
                    <li>
                        <form action="acciones/auth-cerrar-sesion.php" method="post">
                            <button class="nav-link" style="background-color: inherit; border: inherit" type="submit">Cerrar sesión</button>
                        </form>
                    </li>
                    <?php
                    endif;
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="container-fixed">
    <?php
    if($mensajeExito !== null):
        ?>
        <div class="msg-success"><?= $mensajeExito;?></div>
    <?php
    endif;
    ?>
    <?php
    if($mensajeError !== null):
        ?>
        <div class="msg-error"><?= $mensajeError;?></div>
    <?php
    endif;
    ?>

    <?php
    // Incluimos la sección que queremos mostrar
    require __DIR__ . '/secciones/' . $vista . '.php';
    ?>
</div>
<footer>
    <ul>
        <li><a href="#"><img src="../imgs/facebook.png" alt="facebook icono"></a></li>
        <li><a href="#"><img src="../imgs/instagram.png" alt="instagram icono"></a></li>
        <li><a href="#"><img src="../imgs/twitter.png" alt="twitter icono"></a></li>

    </ul>
    <p>Bryan scalzo, Programacion II, DWTN2A, 2021</p>
</footer>
<script src="../js/jquery-3.5.1.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
