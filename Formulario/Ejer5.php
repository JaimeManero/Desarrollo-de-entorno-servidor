<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $valoracion = $_POST['valoracion'];
    $comentario = $_POST['comentario'];

    echo "Comentario de $usuario: Valoración $valoracion. $comentario";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Valoraciones</title>
</head>
<body>
    <h1>Deja tu Comentario</h1>
    <form method="POST" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        
        <label for="valoracion">Valoración (1-5):</label>
        <input type="number" id="valoracion" name="valoracion" min="1" max="5" required><br><br>
        
        <label for="comentario">Comentario:</label><br>
        <textarea id="comentario" name="comentario" rows="4" required></textarea><br><br>
        
        <button type="submit">Enviar Comentario</button>
    </form>
</body>
</html>
