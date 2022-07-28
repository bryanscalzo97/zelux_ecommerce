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
            <button class="nav-link" style="background-color: inherit; border: inherit" type="submit">Comprar</button>
        </form>
        <?php endif;?>
    </div>
</main>


