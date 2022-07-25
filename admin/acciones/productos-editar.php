<?php
require_once __DIR__ . '/../../bootstrap/init.php';



$autenticacion = new Autenticacion();
if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensaje_error'] = "Esta acción requiere de haber iniciado sesión.";
    header('Location: ../index.php?s=login');
    exit;
}



// 2.
$id                 = $_POST['id'];
$titulo             = $_POST['titulo'];
$intro              = $_POST['intro'];
$texto              = $_POST['texto'];
$precio_inicial         = $_POST['precio_inicial'];
$precio_inicial         = (int)$precio_inicial;
$precio_descuento       = $_POST['precio_descuento'];
$precio_descuento       = (int)$precio_descuento;
$alt                = $_POST['alt'];
$img                = $_FILES['img']['name'];





$validator = new ProductoCrearValidador($_POST);
$validator->ejecutar();


// Si el validador falla, redireccionamos al usuario al form.

if($validator->hasErrors()) {
    $_SESSION['errores'] = $validator->getErrores();
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?s=productos-editar&id=" . $id);
    exit;
}

// Levantamos el producto que estamos editando.
$producto = (new Producto())->traerPorPk($id);


if(!empty($img['tmp_name'])) {
    $nombreImagen = date('YmdHis_') . $img['img'];

    move_uploaded_file($img['tmp_name'], __DIR__ . '/../../imgs/' . $nombreImagen);
} else {
    // si el usuario no cambia la imagen tomamos la imagen que ya tenia
    $nombreImagen = $producto->getImg();
}
$categoria = $producto->getCategoria();
try {
    $producto = new Producto();
    $producto->editar($id, [
        'usuario_fk' => 11, // TODO: usuario hardcodeado
        'titulo' => $titulo,
        'intro' => $intro,
        'texto' => $texto,
        'precio_inicial' => $precio_inicial,
        'precio_descuento' => $precio_descuento,
        'img' => $nombreImagen,
        'alt' => $alt,
        'categoria' => $categoria,
    ]);
    $_SESSION['mensaje_exito'] = "¡Éxito! El producto fue editada correctamente.";
    header("Location: ../index.php?s=productos");
    exit;
} catch(PDOException $e) {

    $_SESSION['mensaje_error'] = "El producto no pudo ser editada.";
    header("Location: ../index.php?s=productos-editar&id=" . $id);
    exit;
}
