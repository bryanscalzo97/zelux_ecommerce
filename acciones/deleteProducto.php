<?php
require_once __DIR__ . '/../bootstrap/init.php';

$id_producto = $_POST['id_producto'];


(new Carrito())->deleteProducto($id_producto);


header("Location: ../index.php?s=carrito"); 