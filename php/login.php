<?php
session_start();
require_once "conexion.php";

$error = "";

//  SOLO PROCESAR SI ES POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

    try {

        //  buscar usuario
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$usuario]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //  usuario no existe
        if (!$user) {
            $error = "Usuario no encontrado";
        }

        //  contraseña incorrecta
        else if (!password_verify($password, $user['password'])) {
            $error = "Contraseña incorrecta";
        }

        // ✔ login correcto
        else {

            //  guardar sesión (CLAVE PARA TODO EL SISTEMA)
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['rol'] = $user['rol'];

            //  redirección por rol
            if ($user['rol'] === 'admin') {
                header("Location: ../paginas/admin.php");
                exit;
            }

            header("Location: ../index.php");
            exit;
        }

    } catch (PDOException $e) {
        $error = "Error en el sistema";
    }
}
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
            <li><a href="../paginas/instalaciones.php">Instalaciones</a></li>
            <li><a href="../paginas/reservas.php">Reservas</a></li>
            <li><a href="../paginas/contacto.php">Contacto</a></li>

        </ul>

    </nav>

</header>

<main>

    <section class="presentacion">

        <div class="cuadro">

            <h2>Iniciar sesión</h2>

            <p>Accede para gestionar tus reservas de pádel.</p>

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
                    Entrar
                </button>

            </form>

            <p style="text-align:center; margin-top:15px;">
                ¿No tienes cuenta?
                <a href="../paginas/registro.php">Regístrate aquí</a>
            </p>

        </div>

    </section>

</main>

</body>
</html>