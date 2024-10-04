<?php 

?>
<html>
    <head>
    </head>
    <body>
        <h1>Registro</h1>
        <form method="POST" action="Registro.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="correo">Correo electronico:</label>
        <input type="text" id="correo" name="correo" required><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="text" id="pass" name="pass" required><br><br>
        <button type="submit">Registrarse</button>
        </form>
        <br><br>
        <h1>Login</h1>
        <form method="POST" action="Login.php">
        <label for="correo">Correo:</label>
        <input type="text" id="correo" name="correo"><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="text" id="pass" name="pass" required><br><br>
        <button type="submit">Login</button>
        </form>
    </body>
</html>