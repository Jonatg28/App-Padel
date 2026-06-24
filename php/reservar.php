<?php
session_start();
require_once "conexion.php";

//  comprobar login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../paginas/login.php");
    exit;
}

//  recoger datos del formulario
$usuario_id = $_SESSION['usuario_id'];
$pista = $_POST['pista'] ?? null;
$horario = $_POST['horario'] ?? null;

//  validar datos
if (!$pista || !$horario) {
    header("Location: ../paginas/reservas.php?error=datos");
    exit;
}

try {

    //  insertar reserva
    $sql = "INSERT INTO reservas (usuario_id, pista, horario)
            VALUES (?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$usuario_id, $pista, $horario]);

    // ✔ éxito
    header("Location: ../paginas/reservas.php?ok=1");
    exit;

} catch (PDOException $e) {

    //  error (normalmente duplicado por UNIQUE)
    header("Location: ../paginas/reservas.php?error=ocupado");
    exit;
}
?>