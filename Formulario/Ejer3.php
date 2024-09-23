<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmarpassword = $_POST['confirmarpassword'];

    if ($password === $confirmarpassword) {
        echo "Registro exitoso: $username, $email. Las contraseñas coinciden.";
    } else {
        echo "Las contraseñas no coinciden.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form method="POST" action="">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="confirmarpassword">Repetir Contraseña:</label>
        <input type="password" id="confirmarpassword" name="confirmarpassword" required><br><br>
        
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
