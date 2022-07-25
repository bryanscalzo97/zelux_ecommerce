<?php
$productos = (new Producto())->todosProductos();
?>
<main class="main-content admin-productos">
    <div class="container">
        <h1 class="mb-1">Administración de Productos</h1>
        <div class="mb-1">
            <a style="margin-bottom: 1em" class="btn btn-warning" href="index.php?s=productos-nuevo">Crear producto</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Intro</th>
                    <th>Texto</th>
                    <th>Precio Inicial</th>
                    <th>Precio Descuento</th>
                    <th>Id categoria</th>
                    <th>img</th>

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($productos as $producto): ?>
                <tr>
                    <td><?= $producto->getProductoId();?></td>
                    <td><?= htmlspecialchars($producto->getTitulo());?></td>
                    <td><?= htmlspecialchars($producto->getIntro());?></td>
                    <td><?= htmlspecialchars($producto->getTexto());?></td>
                    <td><?= htmlspecialchars($producto->getPrecioInicial());?></td>
                    <td><?= htmlspecialchars($producto->getPrecioDescuento());?></td>
                    <td><?= htmlspecialchars($producto->getCategoria());?></td>
                    <td><img src="<?= '../imgs/' . $producto->getImg();?>" alt="<?= htmlspecialchars($producto->getAlt());?>"></td>

                    <td>
                        <a style="width: 100%" class="btn btn-outline-secondary" href="index.php?s=productos-editar&id=<?= $producto->getProductoId();?>">Editar</a>

                        <form style="margin-top: 1em" action="acciones/productos-eliminar.php?id=<?= $producto->getProductoId();?>" method="post" class="form-eliminar">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto->getProductoId());?>">
                            <button class="btn btn-danger" type="submit">Eliminar </button>
                        </form>
                    </td>
                </tr>
            <?php
            endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
const forms = document.querySelectorAll('.form-eliminar');
for(let i = 0; i < forms.length; i++) {
forms[i].addEventListener('submit', function(ev) {
const confirmado = confirm('¿Seguro que querés eliminar este producto?');

if(!confirmado) {
ev.preventDefault();
}
});
}
});
</script>

