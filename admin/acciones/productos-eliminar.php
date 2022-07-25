<?php
require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new Autenticacion();
if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensaje_error'] = "Esta acción requiere de haber iniciado sesión.";
    header('Location: ../index.php?s=login');
    exit;
}

$id = $_POST['id'];

try {
    $producto = new Producto();
    $producto->eliminar($id);

    // Enviar un mensaje de éxito...
    $_SESSION['mensaje_exito'] = "El produdcto fue eliminada correctamente.";
    header("Location: ../index.php?s=productos");
    exit;
} catch(Exception $e) {
    // Enviar un mensaje de error...
    $_SESSION['mensaje_error'] = "El producto no pudo ser eliminada.";
    header("Location: ../index.php?s=productos");
    exit;
}
