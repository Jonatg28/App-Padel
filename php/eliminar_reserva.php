<?php
session_start();
require_once "conexion.php";

if ($_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM reservas WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$id]);

header("Location: ../paginas/admin.php");
exit;
?>