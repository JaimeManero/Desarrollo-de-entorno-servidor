<?php
$errors = [];
$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['nombre']);
    $email = trim($_POST['correo']);
    $password = $_POST['contraseña'];
    $confirmPassword = $_POST['confirmarContraseña'];

    if (empty($name)) {
        $errors['name'] = 'El nombre no puede estar vacío.';
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors['name'] = 'El nombre sólo puede contener letras y espacios.';
    }
    if (empty($email)) {
        $errors['email'] = 'El correo electrónico no puede estar vacío.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'El correo electrónico no tiene un formato válido.';
    }
    if (empty($password)) {
        $errors['password'] = 'La contraseña no puede estar vacía.';
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{6,}$/", $password)) {
        $errors['password'] = 'La contraseña debe tener al menos 6 caracteres, incluir una letra mayúscula, una letra minúscula, un número y un símbolo.';
    }
    if (empty($confirmPassword)) {
        $errors['confirmPassword'] = 'Debe confirmar la contraseña.';
    } elseif ($password !== $confirmPassword) {
        $errors['confirmPassword'] = 'Las contraseñas no coinciden.';
    }
    if (empty($errors)) {
        $successMessage = 'Registro exitoso.';
    }
}
?>
<html>
<head>
</head>
<body>
    <h3>Registro de usuario</h3>
    <form method="POST">
        Nombre:<input type="text" name="nombre" value="<?php echo htmlspecialchars($name ?? ''); ?>"><br>
        <div><?php echo $errors['name'] ??''; ?></div>
        Correo electrónico:<input type="email" name="correo" value="<?php echo htmlspecialchars($email ?? ''); ?>"><br>
        <div><?php echo $errors['email'] ?? ''; ?></div>
        Contraseña:<input type="password" name="contraseña"><br>
        <div><?php echo $errors['password'] ?? ''; ?></div>
        Confirmar Contraseña:<input type="password" name="confirmarContraseña"><br>
        <div><?php echo $errors['confirmPassword'] ?? ''; ?></div>
        <button type="submit">Registrarse</button>
        <div><?php echo $successMessage ?? ''; ?></div>
    </form>
</body>
</html>