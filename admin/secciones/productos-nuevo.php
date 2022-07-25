<?php
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
    $oldData = [];
}
?>
<main class="main-content admin-productos">
    <div class="container">
        <h1 class="mb-1">Publicar un nuevo producto</h1>

        <p class="mb-1">Completá el formulario con los datos del producto. Cuando esté completo, apretá "Publicar".</p>

        <form action="acciones/productos-crear.php" method="post" enctype="multipart/form-data">

            <!--Titulo-->
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
            <!--Intro-->
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


            <!--Texto completo-->
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
                <label for="precio_inicial">Precio inicial</label>
                <input type="number" id="precio_inicial" name="precio_inicial" class="form-control" value="<?= $oldData['precio_inicial'] ?? '';?>">
                <?php
                if(isset($errores['precio_inicial'])):
                    ?>
                    <div class="msg-error" id="error-texto"><?= $errores['precio_inicial'];?></div>
                <?php
                endif;
                ?>
            </div>
            <!--Precio descuento-->
            <div class="form-fila">
                <label for="precio_descuento">Precio descuento</label>
                <input type="number" id="precio_descuento" name="precio_descuento" class="form-control" value="<?= $oldData['precio_descuento'] ?? '';?>">
            </div>
            <!--Imagen (opcional)-->
            <div class="form-fila">
                <label for="img">Imagen (opcional)</label>
                <input type="file" id="img" name="img" class="form-control">
            </div>

            <!--Categoria-->
            <div>
                <label class="my-1 mr-2" for="categoria">Categoria</label>
                <select class="custom-select my-1 mr-sm-2" id="categoria" name="categoria">
                    <option selected>Elegí la categoria</option>
                    <option value="5">Colgante</option>
                    <option value="6">Exterior</option>
                    <option value="7">Mesa</option>
                    <option value="8">Bombillas</option>
                </select>
            </div>

            <!--Alt-->
            <div class="form-fila margin1">
                <label for="alt">Descripción de la imagen (opcional)</label>
                <input type="text" id="alt" name="alt" class="form-control" value="<?= $oldData['alt'] ?? '';?>">
            </div>
            <button class="botoncomprar4 button" type="submit">Publicar</button>
        </form>
    </div>
</main>
