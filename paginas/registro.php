<?php
session_start();
require_once "../php/conexion.php";

// 🧠 SI VIENE DEL FORMULARIO
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

    // 🔐 encriptar contraseña
    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {

        // 🔎 comprobar si existe usuario
        $sql = "SELECT id FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$usuario]);

        if ($stmt->rowCount() > 0) {
            $error = "El usuario ya existe";
        } else {

            // 💾 insertar usuario
            $sql = "INSERT INTO usuarios (usuario, password) VALUES (?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$usuario, $hash]);

            // 🔁 redirigir al login
            header("Location: login.php");
            exit;
        }

    } catch (PDOException $e) {
        die("Error en registro: " . $e->getMessage());
    }
}
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

    <section class="presentacion">

        <div class="cuadro">

            <h2>Registro de usuario</h2>

            <p>Crea tu cuenta para poder reservar pistas.</p>

            <!-- 🔴 MENSAJE ERROR -->
            <?php if (!empty($error)): ?>
                <p style="color:red;">
                    <?= $error ?>
                </p>
            <?php endif; ?>

            <form action="" method="POST">

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

            <p style="margin-top:15px; text-align:center;">
                ¿Ya tienes cuenta?
                <a href="login.php">Inicia sesión</a>
            </p>

        </div>

    </section>

</main>

</body>
</html>