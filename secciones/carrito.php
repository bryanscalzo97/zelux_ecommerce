<?php
$carritos = (new Carrito())->todoCarrito($_SESSION['id']);
$total = 0;
?>
<main class="main-content admin-productos">
    <div class="container">
        <h1 class="mb-1">Carrito:</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre producto</th>
                    <th>Precio x unidad</th>
                    <th>Cantidad</th>
                    <th>total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($carritos as $carrito):
                $producto = (new Producto())->traerPorPk($carrito->getProductoId());
                $total += $carrito->getCantidad()*$producto->getPrecioDescuento();
                ?>
                <tr>
                    <td><?= $carrito->getProductoId();?></td>
                    <td><?= htmlspecialchars($producto->getTitulo());?></td>
                    <td><?= htmlspecialchars($producto->getPrecioDescuento());?></td>
                    <td><?= $carrito->getCantidad();?></td>
                    <td><?= $carrito->getCantidad()*$producto->getPrecioDescuento();?></td>
                    <td>
                        <form action="acciones/deleteProducto.php" method="post">
                            <button class="btn btn-danger">Eliminar</button>
                            <Input type="number" name="id_producto" value="<?= $producto->getProductoId() ?>" class="d-none"></Input>
                        </form>
                    </td>
                </tr>
            <?php
            endforeach; ?>
            <tr>
                <td><?= 'total:' . $total ?></td>
            </tr>
            </tbody>
        </table>
        <?php if($total !== 0) : ?>
            <form action="acciones/comprar.php" method="post">
                <button class="nav-link btn btn-warning"  type="submit">Comprar</button>
            </form>
        <?php endif;?>
    </div>
</main>


