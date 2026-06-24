<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio</title>

    <link rel="stylesheet" href="css/estilos.css">

    <!-- Iconos -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<header>

<nav class="tareas">

    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>

    <ul class="menu">

        <li><a href="index.php">Inicio</a></li>
        <li><a href="paginas/instalaciones.php">Instalaciones</a></li>
        <li><a href="paginas/reservas.php">Reservas</a></li>
        <li><a href="paginas/contacto.php">Contacto</a></li>

        <?php if (isset($_SESSION['usuario'])): ?>

            <!-- 🔥 SOLO LOGOUT -->
            <li>
                <a href="php/logout.php" title="Cerrar sesión">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </li>

        <?php else: ?>

            <!-- LOGIN -->
            <li>
                <a href="paginas/login.php" title="Login">
                    <i class="fa-solid fa-user"></i>
                </a>
            </li>

        <?php endif; ?>

    </ul>

</nav>

</header>

<main>

<section class="inicio">

    <div class="texto">

        <h1>Reserva tu pista de pádel en segundos</h1>

        <a href="paginas/reservas.php" class="btn">
            Reservar ahora
        </a>

    </div>

    <div class="imagen">
        <img src="img/pistainicio.jpg" alt="Pista de pádel">
    </div>

</section>

<!-- INFO -->
<section class="info">

    <div class="cuadro">
        <h3>Horario</h3>
        <p>9:00 a 13:30 y de 15:00 a 19:30.</p>
    </div>

    <div class="cuadro">
        <h3>Instalaciones</h3>
        <p>Disponemos de 4 pistas de pádel.</p>
    </div>

    <div class="cuadro">
        <h3>Duración</h3>
        <p>1 hora y 30 minutos por reserva.</p>
    </div>

</section>

</main>

</body>
</html>