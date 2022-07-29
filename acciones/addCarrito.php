<?php
require_once __DIR__ . '/../bootstrap/init.php';

$cantidad = $_POST['cantidad'];
$id_producto = $_POST['id_producto'];
$id_usuario = $_SESSION['id'];

(new Carrito())->crear($cantidad, $id_producto, $id_usuario);


header("Location: ../index.php?s=carrito"); 