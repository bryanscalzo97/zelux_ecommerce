<?php
/**
 * Obtiene todos los productos.
 *
 * @return Producto[]
 */
function productosTodos(): array {
    // Levantamos el contenido del archivo de productos.json.
    $filename       = __DIR__ . '/../data/productos.json';
    $json           = file_get_contents($filename);
    $productosData   = json_decode($json, true);



    // Convertimos ese array de arrays en un array de Productos.
    $salida = [];

    foreach($productosData as $producto) {
        $productoObj = new Producto;
        $productoObj->loadDataFromArray($producto);
        $salida[] = $productoObj;
    }

    return $salida;
}

/**
 * Retorna el producto con el id $id.
 * De no existir, retorna null.
 *
 * @param int $id
 * @return Producto|null
 */
function productosTraerPorId(int $id): ?Producto {
    $productos = productosTodos();

    foreach($productos as $producto) {
        if($producto->getProductoId() === $id) {
            return $producto;
        }
    }

    return null;
}
