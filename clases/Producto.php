<?php

class Producto
{
    /** @var int */
    protected $producto_id;

    /** @var string */
    protected $titulo;

    /** @var string */
    protected $intro; 

    /** @var string */
    protected $texto;

    /** @var int */
    protected $precio_inicial;

    /** @var int */
    protected $precio_descuento;

    /** @var int  */
    protected $img;

    /** @var string */
    protected $alt;

    /** @var  */
    protected $categoria_fk;


    /**
     * Obtiene todas los productos.
     *
     * @return Producto[]
     */
    public function todosProductos(): array
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM productos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }

    /**
     * Retorna el producto con el id $id.
     * De no existir, retorna null.
     *
     * @param int $pk
     * @return Producto|null
     */
    public function traerPorPk(int $pk): ?Producto
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM productos
                  WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $stmt->fetch();

        if(!$producto) {
            return null;
        }

        return $producto;
    }

    /**
     * Retorna el producto con el id $id.
     * De no existir, retorna null.
     *
     * @param int $pk
     * @return Producto|null
     */
    public function traerPorIdUsuario(int $id_usuario): ?Producto
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM productos
                  WHERE usuario_fk = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id_usuario]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $stmt->fetch();

        if(!$producto) {
            return null;
        }

        return $producto;
    }


    /**
     * Crea un registro en la base de datos.
     * Lanza una PDOException en caso de ocurrir un error en la consulta.
     *
     * @param array $data
     * @throws PDOException
     */
    public function crear(array $data)
    {

        $db = (new Conexion())->getConexion();
        $query = "INSERT INTO productos (usuario_fk, categoria_fk, titulo, intro, texto, precio_inicial, precio_descuento, img, alt)
          VALUES (:usuario_fk, :categoria_fk, :titulo, :intro, :texto, :precio_inicial, :precio_descuento, :img, :alt)"   ;
        $stmt = $db->prepare($query);

        $stmt->execute([
            'usuario_fk' => $data['usuario_fk'],
            'categoria_fk' => $data['categoria_fk'],
            'titulo' => $data['titulo'],
            'intro' => $data['intro'],
            'texto' => $data['texto'],
            'precio_inicial' => $data['precio_inicial'],
            'precio_descuento' => $data['precio_descuento'],
            'img' => $data['img'],
            'alt' => $data['alt'],

        ]);

    }
        /**
     * Edita un producto en la base de datos.
     *
     * @param $pk
     * @param array $data
     */
    public function editar($pk, array $data)
    {
        $db = (new Conexion())->getConexion();
        $query = "UPDATE productos
                SET titulo = :titulo,
                    intro = :intro,
                    texto = :texto,
                    precio_inicial = :precio_inicial,
                    precio_descuento = :precio_descuento,
                    img = :img,
                    alt = :alt,
                    categoria_fk = :categoria
                WHERE producto_id = :producto_id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'titulo' => $data['titulo'],
            'intro' => $data['intro'],
            'texto' => $data['texto'],
            'precio_inicial' => $data['precio_inicial'],
            'precio_descuento' => $data['precio_descuento'],
            'img' => $data['img'],
            'alt' => $data['alt'],
            'categoria' =>$data['categoria'],
            'producto_id' => $pk,
        ]);
    }


    /**
     * Elimina la producto correspondiente a la $pk.
     *
     * @param int $pk
     */
    public function eliminar(int $pk)
    {
        $db = (new Conexion())->getConexion();
        $query = "DELETE FROM productos
                  WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
    }

    /**
     * Carga los datos del array $data en las propiedades equivalentes de la clase.
     *
     * @param array $data
     */
    public function loadDataFromArray(array $data): void
    {
        $this->setProductoId($data['producto_id']);
        $this->setTitulo($data['titulo']);
        $this->setIntro($data['intro']);
        $this->setTexto($data['texto']);
        $this->setPrecioInicial($data['precio_inicial']);
        $this->setPrecioDescuento($data['precio_descuento']);
        $this->setImg($data['img']);
        $this->setAlt($data['alt']);
        $this->setCategoria($data['categoria_fk']);
    }






    /**
     * @return int
     */
    public function getProductoId(): int
    {
        return $this->producto_id;
    }

    /**
     * @param int $producto_id
     */
    public function setCategoria(int $categoria_fk): void
    {
        $this->categoria_fk = $categoria_fk;
    }
    public function getCategoria(): int
    {
        return $this->categoria_fk;
    }

    /**
     * @param int $producto_id
     */
    public function setProductoId(int $producto_id): void
    {
        $this->producto_id = $producto_id;
    }


    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getIntro(): string
    {
        return $this->intro;
    }

    /**
     * @param string $intro
     */
    public function setIntro(string $intro): void
    {
        $this->intro = $intro;
    }

    /**
     * @return string
     */
    public function getTexto(): string
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     */
    public function setTexto(string $texto): void
    {
        $this->texto = $texto;
    }


    /**
     * @return int
     */
    public function getPrecioInicial(): int
    {
        return $this->precio_inicial;
    }

    /**
     * @param int $precio_inicial
     */
    public function setPrecioInicial(int $precio_inicial): void
    {
        $this->precio_inicial = $precio_inicial;
    }

    /**
     * @return int
     */
    public function getPrecioDescuento(): int
    {
        return $this->precio_descuento;
    }

    /**
     * @param int $precio_descuento
     */
    public function setPrecioDescuento(int $precio_descuento): void
    {
        $this->precio_descuento = $precio_descuento;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }


    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt(string $alt): void
    {
        $this->alt = $alt;
    }

}