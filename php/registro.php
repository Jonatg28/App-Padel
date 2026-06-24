<?php
require "conexion.php";

// Validar datos
if (!isset($_POST['usuario'], $_POST['email'], $_POST['password'])) {
    header("Location: ../paginas/login.php");
    exit;
}

$usuario = trim($_POST['usuario']);
$email = trim($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Verificar si el usuario ya existe
$sql = "SELECT id FROM usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$usuario]);

if ($stmt->fetch()) {
    echo "<h3 style='text-align:center;margin-top:50px;'>
            El usuario ya existe
          </h3>";
    echo "<p style='text-align:center;'>
            <a href='../paginas/login.php'>Volver</a>
          </p>";
    exit;
}

// Insertar usuario (rol por defecto: usuario)
$sql = "INSERT INTO usuarios (usuario, email, password, rol) VALUES (?, ?, ?, 'usuario')";
$stmt = $conexion->prepare($sql);
$stmt->execute([$usuario, $email, $password]);

// Redirigir al login
header("Location: ../paginas/login.php?registro=ok");
exit;
?>