<?php

$producto = (new Producto())->traerPorPk($_GET['id']);


if(isset($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
} else {
    $errores = [];
}
if(isset($_SESSION['old_data'])) {
    $oldData = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
} else {
    $oldData = [
        'id' => $producto->getProductoId(),
        'titulo' => $producto->getTitulo(),
        'intro' => $producto->getIntro(),
        'texto' => $producto->getTexto(),
        'precio_inicial' => $producto->getPrecioInicial(),
        'precio_descuento' => $producto->getPrecioDescuento(),
        'img' => $producto->getImg(),
        'alt' => $producto->getAlt(),
        'categoria_fk' => $producto->getCategoria(),
    ];
}
?>
<main class="main-content admin-productos">
    <div class="container">
        <h1 class="mb-1">Editar producto</h1>

        <p class="mb-1">Modificá los datos del producto que quieras cambiar. Cuando esté completo, apretá "Actualizar".</p>

        <form action="acciones/productos-editar.php" method="post" enctype="multipart/form-data">
            <!-- Forma 2. -->
            <input type="hidden" name="id" value="<?= $oldData['id'];?>">
            <div class="form-fila">
                <label for="titulo">Título</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    class="form-control"
                    aria-describedby="help-titulo <?= isset($errores['titulo']) ? 'error-titulo' : '';?>"
                    value="<?= $oldData['titulo'] ?? '';?>"
                >
                <?php
                if(isset($errores['titulo'])):
                ?>
                    <div class="msg-error" id="error-titulo"><span class="visually-hidden">Error: </span><?= $errores['titulo'];?></div>
                <?php
                endif;
                ?>
                <div class="form-help" id="help-titulo">El título debe tener al menos 3 caracteres.</div>
            </div>
            <div class="form-fila">
                <label for="intro">Intro</label>
                <textarea
                    id="intro"
                    name="intro"
                    class="form-control"
                    aria-describedby="help-intro <?= isset($errores['intro']) ? 'error-intro' : '';?>"
                ><?= $oldData['intro'] ?? '';?></textarea>
                <?php
                if(isset($errores['intro'])):
                ?>
                    <div class="msg-error" id="error-intro"><?= $errores['intro'];?></div>
                <?php
                endif;
                ?>
                <div class="form-help" id="help-intro">La intro debe tener como máximo 255 caracteres.</div>
            </div>

            <div class="form-fila">
                <label for="texto">Texto completo</label>
                <textarea
                    id="texto"
                    name="texto"
                    class="form-control"
                    <?= isset($errores['texto']) ? 'aria-describedby="error-texto"' : '';?>
                ><?= $oldData['texto'] ?? '';?></textarea>
                <?php
                if(isset($errores['texto'])):
                ?>
                    <div class="msg-error" id="error-texto"><?= $errores['texto'];?></div>
                <?php
                endif;
                ?>
            </div>

            <!--Precio inicial-->
            <div class="form-fila">
                <label for="precio_inicial">precio_inicial</label>
                <input type="number" id="precio_inicial" name="precio_inicial" class="form-control" value="<?= $oldData['precio_inicial'] ?? '';?>">
            </div>
            <!--Precio descuento-->
            <div class="form-fila">
                <label for="precio_descuento">Precio descuento</label>
                <input type="number" id="precio_descuento" name="precio_descuento" class="form-control" value="<?= $oldData['precio_descuento'] ?? '';?>">
            </div>


            <div class="form-fila">
                <p>Imagen actual</p>
                <div>
                    <img src="<?= '../imgs/' . $producto->getImg();?>" alt="Previsualización de la imagen">
                </div>
                <p class="form-help">Si querés cambiar la imagen, elegí una nueva abajo. Sino, dejá el campo vacío.</p>
            </div>
            <div class="form-fila">
                <label for="imagen">Imagen (opcional)</label>
                <input type="file" id="img" name="img" class="form-control">
            </div>
            <div class="form-fila">
                <label for="imagen_descripcion">Descripción de la imagen (opcional)</label>
                <input type="text" id="alt" name="alt" class="form-control" value="<?= $oldData['alt'] ?? '';?>">
            </div>
            <button class="botoncomprar4 button" type="submit">Actualizar</button>
        </form>
    </div>
</main>
