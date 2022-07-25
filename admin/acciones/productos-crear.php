<?php

require_once __DIR__ . '/../../bootstrap/init.php';

// Verificamos que el usuario este autenticado

$autenticacion = new Autenticacion();
if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensaje_error'] = "Esta acción requiere de haber iniciado sesión.";
    header('Location: ../index.php?s=login');
    exit;
}



$titulo                 = $_POST['titulo'];
$intro                  = $_POST['intro'];
$texto                  = $_POST['texto'];
$precio_inicial         = $_POST['precio_inicial'];
$precio_inicial         = (int)$precio_inicial;
$precio_descuento       = $_POST['precio_descuento'];
$precio_descuento       = (int)$precio_descuento;
$img                    = $_FILES['img']['name'];
$alt                    = $_POST['alt'];
$categoria              = $_POST['categoria'];
$categoria              = (int)$categoria;





$validator = new ProductoCrearValidador($_POST);
$validator->ejecutar();

// Si el validador falla, redireccionamos al usuario al form.
if($validator->hasErrors()) {

    $_SESSION['errores'] = $validator->getErrores();

    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?s=productos-nuevo");
    exit;
}


if(!empty($imagen['tmp_name'])) {

    $nombreImagen = date('YmdHis_') . $imagen['name'];

    move_uploaded_file($imagen['tmp_name'], __DIR__ . '/../../imgs/' . $nombreImagen);
} else {

    $nombreImagen = '';
}

// 5.
try {
    $producto = new Producto();
    $producto->crear([
        'usuario_fk' => 11, // TODO: Usuario hardcodeado
        'categoria_fk' => $categoria,
        'titulo' => $titulo,
        'intro' => $intro,
        'texto' => $texto,
        'precio_inicial' => $precio_inicial,
        'precio_descuento' => $precio_descuento,
        'img' => $img,
        'alt' => $alt
    ]);
    $_SESSION['mensaje_exito'] = "El producto fue publicada correctamente.";
    header("Location: ../index.php?s=productos");
    exit;
} catch(PDOException $e) {
    $_SESSION['mensaje_error'] = "El producto no pudo ser publicada.";
    header("Location: ../index.php?s=productos-nuevo");
    exit;
}
