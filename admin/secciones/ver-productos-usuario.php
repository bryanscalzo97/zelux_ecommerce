<?php
$idUsuario = (int) $_GET['id'];
$historiales = (new Historial())->todoHistorial($idUsuario);
?>
<main class="main-content admin-productos">
    <div class="container">
        <h1 class="mb-1">Productos de id: <?= $idUsuario ?></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID de compra</th>
                    <th>ID de producto</th>
                    <th>Nombre producto</th>
                    <th>Precio x unidad</th>
                    <th>Cantidad</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($historiales as $historial):
                $producto = (new Producto())->traerPorPk($historial->getProductoId());
                ?>
                <tr>
                    <td><?= $historial->getIdCompra();?></td>
                    <td><?= $historial->getProductoId();?></td>
                    <td><?= $producto->getTitulo();?></td>
                    <td><?= $producto->getPrecioDescuento();?></td>
                    <td><?= $historial->getCantidad();?></td>
                    <td><?= $historial->getCantidad()*$producto->getPrecioDescuento();?></td>
                </tr>
            <?php
            endforeach; ?>
            </tbody>
        </table>
    </div>
</main>


