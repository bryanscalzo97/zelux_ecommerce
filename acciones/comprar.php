<?php
require_once __DIR__ . '/../bootstrap/init.php';

$carritos = (new Carrito())->todoCarrito($_SESSION['id']);
$maxId = (new Historial())->getMaxIdCompra($_SESSION['id']);
$idCompra = $maxId+1;

(new Historial())->crear($carritos, $idCompra);

(new Carrito())->deleteCarrito($_SESSION['id']);


header("Location: ../index.php?s=home");
