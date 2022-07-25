<?php

$producto = new Producto();
$productos = $producto->todosProductos();
?>

<section class="seccion-productos">

    <div class="row mb-2">
    <div class=" col-12">
    <h2 id="prod" class="col-12">Productos:</h2>
    </div>
        <?php
        foreach($productos as $producto): ?>
       
            <article class=" col-md-6">
                <div class="padingprod">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-4 nop">
                            <img class="img1" style="width: auto; height: auto;" src="./imgs/<?= htmlspecialchars($producto->getImg());?>" alt="<?= htmlspecialchars($producto->getAlt());?>">
                        </div>
                        <div class="col p-4 d-flex flex-column position-static">
                             <h3 class="mb-0 titulo1"><?= htmlspecialchars($producto->getTitulo());?></h3>
                              <p class="card-text mb-auto"><?= htmlspecialchars($producto->getIntro());?></p>
                             <div class="row">
                                 <div class="col-6">
                                 <del>$<?= htmlspecialchars($producto->getPrecioInicial());?></del><p>$<?= htmlspecialchars($producto->getPrecioDescuento());?></p>
                                 </div>
                                 <div class="col-6">
                                   <a class="botoncomprar" href="index.php?s=productos-leer&id=<?= htmlspecialchars($producto->getProductoId());?>">Ver más</a>
                                 </div>
                             </div>
                             </div>
                    </div>
                </div>
           
            </article>

        <?php
        endforeach; ?>
    </div>
</section>