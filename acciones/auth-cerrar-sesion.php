<?php
require_once __DIR__ . '/../bootstrap/init.php';

$autentication = new Autenticacion();

$autentication->cerrarSesion();

$_SESSION = [];

$_SESSION['mensaje_exito'] = "Sesión cerrada correctamente.";
header("Location: ../index.php?s=login");
