<?php

class ProductoCrearValidador
{

    /**
     * @var array - Los datos a validar.
     */
    protected $data = [];

    /**
     * @var array - Los errores ocurridos en la validación.
     */
    protected $errores = [];

    /**
     * @param array $data - Los datos a validar.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Ejecuta las validaciones.
     */
    public function ejecutar()
    {


        // Validamos el título.
        if(empty($this->data['titulo'])) {
            $this->errores['titulo'] = 'Tenés que escribir un título.';
        } else if(strlen($this->data['titulo']) < 3) {
            $this->errores['titulo'] = 'El título tiene que tener al menos 3 caracteres.';
        }

        // Validamos la intro.
        if(empty($this->data['intro'])) {
            $this->errores['intro'] = 'Tenés que escribir la intro.';
        } else if(strlen($this->data['intro']) > 255) {
            $this->errores['intro'] = 'La intro tiene que tener como máximo 255 caracteres.';
        }

        // Validamos el texto.
        if(empty($this->data['texto'])) {
            $this->errores['texto'] = 'Tenés que escribir el texto del producto.';
        }else if(strlen($this->data['texto']) <60) {
            $this->errores['texto'] = 'El texto tiene que tener como minimo 60 caracteres';
        }
        else if(strlen($this->data['texto']) >255) {
            $this->errores['texto'] = 'La intro tiene que tener como máximo 255 caracteres';
        }





    }

    /**
     * Si hay errores de validación.
     *
     * @return bool
     */
    public function hasErrors(): bool
    {
        return count($this->errores) > 0;
    }

    /**
     * @return array
     */
    public function getErrores(): array
    {
        return $this->errores;
    }
}
