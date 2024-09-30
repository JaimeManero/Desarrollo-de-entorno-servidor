<?php
session_start(); 

if (isset($_POST['enviar'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $nombre_usuario_correcto = 'admin';
    $contrasena_correcta = '1234';

    if ($nombre_usuario === $nombre_usuario_correcto && $contrasena === $contrasena_correcta) {
        $_SESSION['nombre_usuario'] = $nombre_usuario;

        header('Location: Ejer2.2.php');
        exit;
    } else {
        $mensaje_error = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h2>Inicio de sesión</h2>

    <?php
    if (isset($mensaje_error)) {
        echo "<p style='color: red;'>$mensaje_error</p>";
    }
    ?>

    <form action="login.php" method="post">
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <button type="submit" name="enviar">Iniciar sesión</button>
    </form>
</body>
</html>
