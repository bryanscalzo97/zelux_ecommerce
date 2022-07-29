<?php
 $id_usuario = $_SESSION['id'];
 $usuario = (new Usuario())->getUsuarioporId($id_usuario);
?>
<main class="main-content admin-productos">
    <div class="container">
        <h1 class="mb-1">Mi perfil</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($usuario->getUsuarioId());?></td>
                    <td><?= htmlspecialchars($usuario->getEmail());?></td>
                </tr>
            
            </tbody>
        </table>
    </div>
</main>
