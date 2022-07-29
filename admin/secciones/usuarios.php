<?php
 $usuarios = (new Usuario())->todosUsuarios($_SESSION['id']);
?>
<main class="main-content admin-productos">
    <div class="container">
        <h1 class="mb-1">Usuarios:</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>email</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
            <?php
            foreach($usuarios as $usuario):
                // $producto = (new Producto())->traerPorPk($carrito->getProductoId());
                // $total += $carrito->getCantidad()*$producto->getPrecioDescuento();
                ?>
                <tr>
                    <td><?= htmlspecialchars($usuario->getUsuarioId());?></td>
                    <td><?= htmlspecialchars($usuario->getEmail());?></td>
                    <td><a class="botoncomprar" href="index.php?s=ver-productos-usuario&id=<?= htmlspecialchars($_SESSION['id']);?>">Ver más</a></td>
                </tr>
            <?php
            endforeach; ?>
            </tbody>
        </table>
    </div>
</main>


