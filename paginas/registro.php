<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro</title>

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

        </ul>

    </nav>

</header>

<main>

    <!-- INTRO -->
    <section class="presentacion">

        <div class="cuadro">

            <h2>Registro de usuario</h2>

            <p>Crea tu cuenta para poder reservar pistas de pádel.</p>

        </div>

    </section>

    <!-- FORMULARIO -->
    <section class="presentacion">

        <div class="cuadro">

            <form action="../php/registro.php" method="POST">

                <div class="campo">
                    <label>Usuario</label>
                    <input type="text" name="usuario" required>
                </div>

                <div class="campo">
                    <label>Contraseña</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="btn">
                    Registrarse
                </button>

            </form>

            <!--  ERROR DESDE SESSION -->
            <?php if (!empty($_SESSION['error_registro'])): ?>
                <p style="color:red; text-align:center; margin-top:10px;">
                    <?= $_SESSION['error_registro']; ?>
                </p>
                <?php unset($_SESSION['error_registro']); ?>
            <?php endif; ?>

            <!-- 🔙 VOLVER LOGIN -->
            <p style="text-align:center; margin-top:15px;">
                ¿Ya tienes cuenta?
                <a href="login.php">Inicia sesión</a>
            </p>

        </div>

    </section>

</main>

</body>
</html>