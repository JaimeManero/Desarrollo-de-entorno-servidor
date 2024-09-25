<?php
session_start();

if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 1;
} else {
    $_SESSION['visitas']++;
}

if (isset($_POST['reset'])) {
    $_SESSION['visitas'] = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Bienvenido a la página</h1>
    <p>
        <?php
        if ($_SESSION['visitas'] == 1) {
            echo "Esta es tu primera visita.";
        } else {
            echo "Has visitado esta página " . $_SESSION['visitas'] . " veces.";
        }
        ?>
    </p>
    <form method="post">
        <button type="submit" name="reset">Reiniciar contador</button>
    </form>
</body>
</html>
