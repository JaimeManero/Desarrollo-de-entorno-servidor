<!DOCTYPE html>
<html>
<head>
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
<?php
class Comentario {
    private $usuario;
    private $valoracion;
    private $comentario;

    public function __construct($usuario, $valoracion, $comentario) {
        $this->usuario = $usuario;
        $this->valoracion = $valoracion;
        $this->comentario = $comentario;
    }

    public function mostrarComentario() {
        echo "Comentario de " . $this->usuario . ": Valoración " . $this->valoracion . ". " . $this->comentario;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $valoracion = $_POST['valoracion'];
    $comentario = $_POST['comentario'];

    $comentarioObj = new Comentario($usuario, $valoracion, $comentario);

    $comentarioObj->mostrarComentario();
}
?>
