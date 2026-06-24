<?php
session_start();
require "conexion.php";

// Comprobar que llegan los datos del formulario
if (!isset($_POST['usuario']) || !isset($_POST['password'])) {
    header("Location: ../paginas/login.php");
    exit;
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Buscar usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$usuario]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar usuario y contraseña
if ($user && password_verify($password, $user['password'])) {

    // Guardar datos en sesión
    $_SESSION['usuario'] = $user['usuario'];
    $_SESSION['rol'] = $user['rol'];

    // Redirección según rol
    if ($user['rol'] === 'admin') {
        header("Location: ../php/admin.php");
    } else {
        header("Location: ../index.php");
    }

    exit;

} else {
    echo "<h3 style='text-align:center; margin-top:50px;'>
            Usuario o contraseña incorrectos
          </h3>";
    echo "<p style='text-align:center;'>
            <a href='../paginas/login.html'>Volver al login</a>
          </p>";
}
?>