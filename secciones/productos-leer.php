<?php

$idProducto = (int) $_GET['id'];
$producto = new Producto();
$producto = $producto->traerPorPk($idProducto);
?>

<article class=" container col-12" id="prodleer">
    <div class="container-prod row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-4">
            <img class="img1" style="width: auto; height: auto;" src="./imgs/<?= htmlspecialchars($producto->getImg());?>" alt="<?= htmlspecialchars($producto->getAlt());?>">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
            <h2 class="mb-0 titulo1"><?= htmlspecialchars($producto->getTitulo());?></h2>
            <p class="card-text mb-auto"><?= htmlspecialchars($producto->getIntro());?></p>
            <div class="row seccion-precio">
                <div class="col-sm-12 col-md-6">
                    <del>$<?= htmlspecialchars($producto->getPrecioInicial());?></del><p>$<?= htmlspecialchars($producto->getPrecioDescuento());?></p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a class="botoncomprar" href="#">Añadir al carrito</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 description">
                <h4>Descripción:</h4>
                <p class="card-text mb-auto"><?= htmlspecialchars($producto->getTexto());?></p>
            </div>

        </div>
    </div>


</article>





















