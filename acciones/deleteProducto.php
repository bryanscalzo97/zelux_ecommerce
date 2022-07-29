<?php
require_once __DIR__ . '/../bootstrap/init.php';

$id_producto = $_POST['id_producto'];
$id_usuario = $_SESSION['id'];

(new Carrito())->deleteProducto($id_usuario, $id_producto);


header("Location: ../index.php?s=carrito"); 