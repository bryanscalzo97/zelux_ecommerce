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
    ];
}