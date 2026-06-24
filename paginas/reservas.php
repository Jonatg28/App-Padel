<?php
session_start();
require_once "../php/conexion.php";

//  acceso solo usuarios logueados
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservas</title>

    <link rel="stylesheet" href="../css/estilos.css">

    <!-- ICONOS -->
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

            <li>
                <a href="../php/logout.php" title="Cerrar sesión">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </li>

        </ul>

    </nav>

</header>

<main>

<!-- INTRO -->
<section class="presentacion">

    <div class="cuadro">

        <h2>Reservar pista</h2>

        <p>
            Selecciona una pista y un horario disponible.
        </p>

    </div>

</section>

<!-- =========================
     POLIDEPORTIVO LOS PASOS
========================= -->

<section class="instalaciones">

    <div class="cuadro">

        <h3>Polideportivo Los Pasos</h3>

        <div class="pistas">

            <!-- PISTA 1 -->
            <div class="pista">

                <h4>Pista 1</h4>

                <img src="../img/pista7.jpg" alt="Pista 1">

                <form action="../php/reservar.php" method="POST">

                    <input type="hidden" name="pista" value="Pista 1">

                    <select name="horario">
                        <option>9:00 - 10:30</option>
                        <option>10:30 - 12:00</option>
                        <option>12:00 - 13:30</option>
                        <option>15:00 - 16:30</option>
                        <option>16:30 - 18:00</option>
                        <option>18:00 - 19:30</option>
                    </select>

                    <button type="submit" class="btn">Reservar</button>

                </form>

            </div>

            <!-- PISTA 2 -->
            <div class="pista">

                <h4>Pista 2</h4>

                <img src="../img/pista7.jpg" alt="Pista 2">

                <form action="../php/reservar.php" method="POST">

                    <input type="hidden" name="pista" value="Pista 2">

                    <select name="horario">
                        <option>9:00 - 10:30</option>
                        <option>10:30 - 12:00</option>
                        <option>12:00 - 13:30</option>
                        <option>15:00 - 16:30</option>
                        <option>16:30 - 18:00</option>
                        <option>18:00 - 19:30</option>
                    </select>

                    <button type="submit" class="btn">Reservar</button>

                </form>

            </div>

        </div>

    </div>

    <!-- =========================
         CAMPO MUNICIPAL B4
    ========================= -->

    <div class="cuadro">

        <h3>Campo Municipal B4</h3>

        <div class="pistas">

            <!-- PISTA 3 -->
            <div class="pista">

                <h4>Pista 3</h4>

                <img src="../img/pista8.jpg" alt="Pista 3">

                <form action="../php/reservar.php" method="POST">

                    <input type="hidden" name="pista" value="Pista 3">

                    <select name="horario">
                        <option>9:00 - 10:30</option>
                        <option>10:30 - 12:00</option>
                        <option>12:00 - 13:30</option>
                        <option>15:00 - 16:30</option>
                        <option>16:30 - 18:00</option>
                        <option>18:00 - 19:30</option>
                    </select>

                    <button type="submit" class="btn">Reservar</button>

                </form>

            </div>

            <!-- PISTA 4 -->
            <div class="pista">

                <h4>Pista 4</h4>

                <img src="../img/pista8.jpg" alt="Pista 4">

                <form action="../php/reservar.php" method="POST">

                    <input type="hidden" name="pista" value="Pista 4">

                    <select name="horario">
                        <option>9:00 - 10:30</option>
                        <option>10:30 - 12:00</option>
                        <option>12:00 - 13:30</option>
                        <option>15:00 - 16:30</option>
                        <option>16:30 - 18:00</option>
                        <option>18:00 - 19:30</option>
                    </select>

                    <button type="submit" class="btn">Reservar</button>

                </form>

            </div>

        </div>

    </div>

</section>

</main>

</body>
</html>