<?php

class Carrito
{
    /** @var int */
    protected $id_carrito;

    /** @var int */
    protected $id_usuario;

    /** @var int */
    protected $id_producto;

    /** @var int */
    protected $cantidad;


     /**
     * Obtiene todo el carrito.
     * @param int $pk
     * @return Carrito[]
     */
    public function todoCarrito(int $pk): array
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM carrito WHERE id_usuario = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }

    /**
     * @return int
     */
    public function getProductoId(): int
    {
        return $this->id_producto;
    }

    /**
     * @return int
     */
    public function getCantidad(): int
    {
        return $this->cantidad;
    }

      /**
     * Borra el carrito
     * @param int $pk
     * @return Carrito[]
     */
    public function deleteCarrito(int $pk): array
    {
        $db = (new Conexion())->getConexion();
        $query = "DELETE FROM carrito WHERE id_usuario = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }
    
}