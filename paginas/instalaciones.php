<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Instalaciones</title>

    <link rel="stylesheet" href="../css/estilos.css">

    <!-- ICONOS (FontAwesome) -->
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
            <li><a href="instalaciones.php">Instalaciones</a></li>
            <li><a href="reservas.php">Reservas</a></li>
            <li><a href="contacto.php">Contacto</a></li>

            <?php if (isset($_SESSION['usuario'])): ?>

                <!-- LOGOUT -->
                <li>
                    <a href="../php/logout.php" title="Cerrar sesión">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>

            <?php else: ?>

                <!-- LOGIN -->
                <li>
                    <a href="login.php" title="Login">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>

            <?php endif; ?>

        </ul>

    </nav>

</header>

<main>

    <section class="instalaciones">

        <div class="cuadro">
            <p>
                En el proyecto se contempla la dotación de cuatro pistas de pádel para el polideportivo, con el objetivo de ampliar la oferta deportiva y mejorar las instalaciones disponibles para los usuarios. Concretamente, se disponen dos pistas de pádel descubiertas en el Polideportivo Los Pasos y dos pistas cubiertas en el Campo Municipal B4.
            </p>
        </div>

        <div class="cuadro">
            <h3>Polideportivo Los Pasos</h3>
            <p>
                Las pistas descubiertas permiten la práctica del pádel al aire libre.
            </p>

            <div class="imagenes-instalacion">
                <img src="../img/pista1.jpg" alt="Pista de Pádel">
                <img src="../img/pista2.jpg" alt="Pista de Pádel">
                <img src="../img/pista5.jpg" alt="Pista de Pádel">
            </div>
        </div>

        <div class="cuadro">
            <h3>Campo Municipal B4</h3>
            <p>
                Las pistas cubiertas permiten su uso durante todo el año.
            </p>

            <div class="imagenes-instalacion">
                <img src="../img/pista3.jpg" alt="Pista de Pádel">
                <img src="../img/pista4.jpg" alt="Pista de Pádel">
                <img src="../img/pista6.jpg" alt="Pista de Pádel">
            </div>
        </div>

    </section>

</main>

</body>
</html>