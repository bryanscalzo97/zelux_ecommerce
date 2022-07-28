<?php

class Historial
{
    /** @var int */
    protected $id_historial_carrito;

    /** @var int */
    protected $id_usuario;

    /** @var int */
    protected $id_producto;

    /** @var int */
    protected $cantidad;

    /** @var int */
    protected $id_compra;


     /**
     * Obtiene todo el carrito.
     * @param int $pk
     * @return Historial[]
     */
    public function todoHistorial(int $pk): array
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM historial_carrito WHERE id_usuario = ?";
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
    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }


    /**
     * @return int
     */
    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    /**
     * @return int
     */
    public function getIdCompra(): int
    {
        return $this->id_compra;
    }

       /**
     * Obtiene todo el carrito.
     * @param int $pk
     * @return int 
     */
    public function getMaxIdCompra(int $pk): int
    {
        $db = (new Conexion())->getConexion();
        $query = "SELECT * FROM historial_carrito WHERE id_usuario = ? ORDER BY id_compra DESC LIMIT 1 ";
        $stmt = $db->prepare($query);
        $stmt->execute([$pk]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $historial = $stmt->fetchAll();
        return isset($historial[0]) ? $historial[0]->getIdCompra() : 0;
    }

     /**
     * Crea un registro en la base de datos.
     * Lanza una PDOException en caso de ocurrir un error en la consulta.
     *
     * @param array $data
     * @throws PDOException
     */
    public function crear($carritos, $idCompra)
    {

        $db = (new Conexion())->getConexion();
        $query = "INSERT INTO historial_carrito (id_usuario, id_producto, cantidad, id_compra)
          VALUES (:id_usuario, :id_producto, :cantidad, :id_compra)"   ;
        
        foreach($carritos as $carrito):
            $stmt = $db->prepare($query);

            $stmt->execute([
                'id_usuario' => $_SESSION['id'],
                'id_producto' => $carrito->getProductoId(),
                'cantidad' => $carrito->getCantidad(),
                'id_compra' => $idCompra,
    
            ]);
        endforeach; 
       

    }

    
    
}