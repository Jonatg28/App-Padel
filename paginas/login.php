<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

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

    <!-- PRESENTACIÓN -->
    <section class="presentacion">

        <div class="cuadro">

            <h2>Iniciar sesión</h2>

            <p>
                Accede para gestionar tus reservas de pádel.
            </p>

        </div>

    </section>

    <!-- LOGIN FORM -->
    <section class="presentacion">

        <div class="cuadro">

            <form action="../php/login.php" method="POST" class="form-contacto">

                <div class="campo">
                    <label>Usuario</label>
                    <input type="text" name="usuario" required>
                </div>

                <div class="campo">
                    <label>Contraseña</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="btn">
                    Entrar
                </button>

            </form>

            <!-- 🔥 ENLACE A REGISTRO -->
            <p style="margin-top:15px; text-align:center;">
                ¿No tienes cuenta?
                <a href="registro.php">Regístrate aquí</a>
            </p>

        </div>

    </section>

</main>

</body>
</html>