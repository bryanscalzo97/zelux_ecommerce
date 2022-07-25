<?php

class Conexion
{
    /** @var PDO */
    protected $db;

    protected const DB_HOST = "127.0.0.1";
    protected const DB_USER = "root";
    protected const DB_PASS = "";
    protected const DB_BASE = "dw3-scalzo-bryan";

    /**
     * @return PDO
     */
    public function getConexion(): PDO
    {
        $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_BASE . ";charset=utf8mb4";

        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASS);

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e) {
            die("Error al conectar con el servidor de la Base de Datos<br>");
        }

        return $this->db;
    }
}
