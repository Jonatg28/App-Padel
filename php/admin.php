<?php
session_start();
require "conexion.php";

// Seguridad: solo admin
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../paginas/login.php");
    exit;
}

// Obtener usuarios
$sql = "SELECT * FROM usuarios";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

<header>
    <nav class="tareas">
        <div class="logo">
            <img src="../img/logo.png">
        </div>

        <ul class="menu">
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../paginas/reservas.php">Reservas</a></li>
            <li><a href="../paginas/contacto.php">Contacto</a></li>
            <li><a href="logout.php">Salir</a></li>
        </ul>
    </nav>
</header>

<main>

<section class="presentacion">
    <div class="cuadro">
        <h2>Panel de administración</h2>
        <p>Gestión de usuarios del sistema</p>
    </div>
</section>

<section class="presentacion">
    <div class="cuadro">

        <table border="1" style="width:100%; text-align:center;">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['usuario'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['rol'] ?></td>
                <td>
                    <a href="eliminar.php?id=<?= $u['id'] ?>"
                       onclick="return confirm('¿Eliminar usuario?')">
                       Eliminar
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>

    </div>
</section>

</main>

</body>
</html>