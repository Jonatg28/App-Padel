<?php
session_start();
require_once "../php/conexion.php";

//  solo admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

//  usuarios
$usuarios = $conexion->query("SELECT id, usuario, rol FROM usuarios")
                    ->fetchAll(PDO::FETCH_ASSOC);

//  reservas
$reservas = $conexion->query("
    SELECT r.id, r.pista, r.horario, u.usuario
    FROM reservas r
    INNER JOIN usuarios u ON r.usuario_id = u.id
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="../css/estilos.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<header>

    <nav class="tareas">

        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
        </div>

        <ul class="menu">

            <li><a href="../index.php">Inicio</a></li>
            <li><a href="reservas.php">Reservas</a></li>

            <li>
                <a href="../php/logout.php" title="Cerrar sesión">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </li>

        </ul>

    </nav>

</header>

<main>

<!-- ========================= -->
<!--  USUARIOS -->
<!-- ========================= -->

<section class="presentacion">
    <div class="cuadro">
        <h2> Usuarios</h2>
    </div>
</section>

<section class="instalaciones">

<?php foreach ($usuarios as $u): ?>

    <div class="cuadro">

        <p><strong>Usuario:</strong> <?= $u['usuario'] ?></p>
        <p><strong>Rol:</strong> <?= $u['rol'] ?></p>

        <?php if ($u['rol'] !== 'admin'): ?>
            <a class="btn"
               href="/Practica_LM/php/eliminar_usuario.php?id=<?= $u['id'] ?>"
               onclick="return confirm('¿Eliminar usuario?')">
                Eliminar usuario
            </a>
        <?php endif; ?>

    </div>

<?php endforeach; ?>

</section>

<!-- ========================= -->
<!--  RESERVAS -->
<!-- ========================= -->

<section class="presentacion">
    <div class="cuadro">
        <h2>Reservas</h2>
    </div>
</section>

<section class="instalaciones">

<?php foreach ($reservas as $r): ?>

    <div class="cuadro">

        <p><strong>Usuario:</strong> <?= $r['usuario'] ?></p>
        <p><strong>Pista:</strong> <?= $r['pista'] ?></p>
        <p><strong>Horario:</strong> <?= $r['horario'] ?></p>

        <a class="btn"
           href="../php/eliminar_reserva.php?id=<?= $r['id'] ?>"
           onclick="return confirm('¿Eliminar reserva?')">
            Eliminar reserva
        </a>

    </div>

<?php endforeach; ?>

</section>

</main>

</body>
</html>