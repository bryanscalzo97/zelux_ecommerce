<?php

/**
 * Rutas del sitio
 * @return string[][]
 */
function getRutasSitio()
{
    return [
        'home' => [
            'title' => 'Página principal',
        ],
        'productos' => [
            'title' => 'Lista de productos',
        ],
        'productos-leer' => [
            'title' => 'descripción del producto',
        ],
        'iniciar-sesion' => [
            'title' => 'Iniciar sesión',
        ],
        'registro' => [
            'title' => 'Registrarse',
        ],
        'contacto' => [
            'title' => 'Contacto',
        ],
        'login' => [
            'title' => 'Login',
        ],
        'carrito' => [
            'title' => 'Carrito',
        ],
        'perfil' => [
            'title' => 'Perfil',
        ],
        'registro' => [
            'title' => 'Registro',
        ],
        'historial' => [
            'title' => 'Historial',
        ],

        '404' => [
            'title' => 'Página no encontrada',
        ],
    ];
}

/**
 * Rutas panel Administracion
 *
 * @return array[]
 */
function getRutasAdmin(): array {
    return [
        'home' => [
            'title' => 'Inicio',
            'autenticacion' => true,
        ],
        'login' => [
            'title' => 'Iniciar Sesión',
        ],
        'productos' => [
            'title' => 'Administración de Productos',
            'autenticacion' => true,
        ],
        'productos-nuevo' => [
            'title' => 'Publicar Producto',
            'autenticacion' => true,
        ],
        'productos-editar' => [
            'title' => 'Publicar Producto',
            'autenticacion' => true,
        ], 
        'usuarios' => [
            'title' => 'Usuarios',
            'autenticacion' => true,
        ],
        'ver-productos-usuario' => [
            'title' => 'ver-productos-usuario',
            'autenticacion' => true,
        ],
    ];
}