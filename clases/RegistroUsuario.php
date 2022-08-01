<?php

class RegistroUsuario
{
    /**
     * @var Usuario
     */
    protected $usuario;

    /**
     * @param string $email
     * @param string $password
     * @return bool - Si la autenticación tuvo éxito o no.
     */
    public function iniciarSesion(string $email, string $password): bool
    {

        // Buscamos el usuario por su email.
        $this->usuario = (new Usuario())->traerPorEmail($email);

        if($this->usuario === null) {
            return false;
        }

        // Verificamos el password.
        if(!password_verify($password, $this->usuario->getPassword())) {
            return false;
        }
        $this->autenticarUsuario($this->usuario);
        return true;
    }

        /**
     * @param string $email
     * @param string $password
     */
    public function crearUsuario(string $email, string $password)
    {
        $db = (new Conexion())->getConexion();
        $query = "INSERT INTO usuarios (email, password, rol_fk)
          VALUES (:email, :password, :rol_fk)"   ;
        $stmt = $db->prepare($query);
        $stmt->execute([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol_fk' => 2,
        ]);
    }

    /**
     * Autentica al usuario en el sistema.
     *
     * @param Usuario $usuario
     */
    public function autenticarUsuario(Usuario $usuario)
    {

        $_SESSION['id'] = $usuario->getUsuarioId();
    }

    /**
     * Cierra la sesión.
     */
    public function cerrarSesion()
    {
        unset($_SESSION['id']);
    }

    /**
     * @return bool
     */
    public function estaAutenticado(): bool
    {
        return isset($_SESSION['id']);
    }
}