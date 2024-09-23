<?php 

class user{
    private $username;
    private $email;
    private $password;
    function __construct($username,$email,$password)
    {
        $this -> username=$username;
        $this -> email=$email;
        $this -> password=$password;
    } 
    function validarpassword($confirmarpassword){
        return $this -> password ===$confirmarpassword;
    }
    function registro(){
        return "Registro exitoso: $this->username, $this->email. Las contraseñas coinciden.";

    }
    function error(){
        return "Las contraseñas no coinciden";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmarpassword = $_POST['confirmar$confirmarpassword'];

    $user = new User($username, $email, $password);

    if ($user->validarpassword($confirmarpassword)) {
        echo $user->registro();
    } else {
        echo $user->error();
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
        
        <label for="confirmar$confirmarpassword">Repetir Contraseña:</label>
        <input type="password" id="confirmar$confirmarpassword" name="confirmar$confirmarpassword" required><br><br>
        
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
