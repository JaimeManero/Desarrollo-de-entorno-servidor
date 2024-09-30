<?php
session_start(); 

if (!isset($_SESSION['nombre_usuario'])) {

    header('Location: Ejer2.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?>!</h1>
    <p>Has iniciado sesión correctamente.</p>

    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>
