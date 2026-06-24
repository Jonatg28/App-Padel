<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contacto</title>

    <link rel="stylesheet" href="../css/estilos.css">

    <!-- Iconos -->
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

            <!-- SOLO LOGOUT -->
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

<!-- INTRODUCCIÓN -->
<section class="presentacion">

    <div class="cuadro">

        <h2>Contacto</h2>

        <p>
            Si tienes alguna duda sobre nuestras pistas de pádel, horarios o reservas,
            puedes ponerte en contacto con nosotros utilizando el siguiente formulario.
            Nuestro equipo te responderá lo antes posible.
            También puedes llamar al número que aparece a continuación.
        </p>

    </div>

</section>

<!-- FORMULARIO -->
<section class="presentacion">

    <div class="cuadro">

        <h3>Envíanos un mensaje</h3>

        <form class="form-contacto">

            <div class="fila">

                <div class="campo">
                    <label>Nombre</label>
                    <input type="text" placeholder="Tu nombre" required>
                </div>

                <div class="campo">
                    <label>Email</label>
                    <input type="email" placeholder="Tu correo electrónico" required>
                </div>

            </div>

            <div class="campo">
                <label>Motivo</label>
                <select>
                    <option>Consulta general</option>
                    <option>Problema con una reserva</option>
                    <option>Información sobre instalaciones</option>
                    <option>Otros</option>
                </select>
            </div>

            <div class="campo">
                <label>Mensaje</label>
                <textarea rows="5" placeholder="Escribe tu mensaje aquí"></textarea>
            </div>

            <button class="btn">Enviar mensaje</button>

        </form>

    </div>

</section>

<!-- DATOS -->
<section class="presentacion">

    <div class="cuadro">

        <h3>Información de contacto</h3>

        <p><strong>Teléfono:</strong> 966 123 456</p>
        <p><strong>Email:</strong> contacto@redopadel.com</p>
        <p><strong>Dirección:</strong> Plaza del Ayuntamiento, 1, 03370 Redován, Alicante</p>
        <p><strong>Horario:</strong> Lunes a Viernes 9:00 - 19:30</p>

    </div>

</section>

</main>

</body>
</html>