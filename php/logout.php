<?php
session_start();

//  borrar todas las variables de sesión
$_SESSION = [];

//  destruir la sesión
session_destroy();

//  redirigir al inicio
header("Location: ../index.php");
exit;
?>