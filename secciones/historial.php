<?php
$historiales = (new Historial())->todoHistorial($_SESSION['id']);
?>
<main class="main-content admin-productos">
    <div class="container">
        <h1 class="mb-1">Historial:</h1>
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
                    <td><?= htmlspecialchars($producto->getTitulo());?></td>
                    <td><?= htmlspecialchars($producto->getPrecioDescuento());?></td>
                    <td><?= $historial->getCantidad();?></td>
                    <td><?= $historial->getCantidad()*$producto->getPrecioDescuento();?></td>
                </tr>
            <?php
            endforeach; ?>
            </tbody>
        </table>
    </div>
</main>


