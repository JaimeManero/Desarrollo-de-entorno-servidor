<?php
$duracion_cookie = time() + (365 * 24 * 60 * 60);

if (isset($_COOKIE['visitas'])) {
    $visitas = $_COOKIE['visitas'] + 1;
} else {
    $visitas = 1;
}

if (isset($_POST['reset'])) {
    $visitas = 1;
}

setcookie('visitas', $visitas, $duracion_cookie);

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Bienvenido a la página</h1>
    <p>
        <?php
        if ($visitas == 1) {
            echo "Esta es tu primera visita.";
        } else {
            echo "Has visitado esta página $visitas veces.";
        }
        ?>
    </p>

    <form method="post">
        <button type="submit" name="reset">Reiniciar contador</button>
    </form>
</body>
</html>
