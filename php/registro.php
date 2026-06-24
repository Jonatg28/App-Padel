<?php
session_start();
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

    try {

        //  comprobar si el usuario ya existe
        $sql = "SELECT id FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$usuario]);

        $existe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existe) {
            $error = "❌ El usuario ya existe";
        } else {

            //  encriptar contraseña
            $hash = password_hash($password, PASSWORD_DEFAULT);

            //  insertar usuario
            $sql = "INSERT INTO usuarios (usuario, password)
                    VALUES (?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$usuario, $hash]);

            //  redirigir al login
            header("Location: ../paginas/login.php");
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
            <li><a href="../paginas/instalaciones.php">Instalaciones</a></li>
            <li><a href="../paginas/reservas.php">Reservas</a></li>
            <li><a href="../paginas/contacto.php">Contacto</a></li>

        </ul>

    </nav>

</header>

<main>

    <section class="presentacion">

        <div class="cuadro">

            <h2>Registro de usuario</h2>

            <p>Crea tu cuenta para poder reservar pistas.</p>

            <!--  ERROR -->
            <?php if (!empty($error)): ?>
                <p style="color:red; text-align:center;">
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

            <p style="text-align:center; margin-top:15px;">
                ¿Ya tienes cuenta?
                <a href="login.php">Inicia sesión</a>
            </p>

        </div>

    </section>

</main>

</body>
</html>