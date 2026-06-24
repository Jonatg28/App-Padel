<?php
session_start();
require_once "conexion.php";

//  solo admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];

//  eliminar usuario
$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$id]);

header("Location: ../paginas/admin.php");
exit;
?>