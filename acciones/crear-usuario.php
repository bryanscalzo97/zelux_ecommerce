<?php
require_once __DIR__ . '/../bootstrap/init.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

$registro = new RegistroUsuario();

$registro->crearUsuario($email, $password);
header('Location: ../index.php?s=login');