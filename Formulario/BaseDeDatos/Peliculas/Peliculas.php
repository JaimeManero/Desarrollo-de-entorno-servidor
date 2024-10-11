<?php
$servername = "db";
$username = "root";
$contrasena = "root";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $contrasena, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $pelicula = $_POST['pelicula'];
    $isan = trim($_POST['isan']);
    $año = $_POST['año'];
    $valoracion = $_POST['valoracion'];

    $sql = "INSERT INTO peliculas (pelicula, ISAN, año, puntuacion)
            VALUES ('$pelicula', '$isan', '$año', '$valoracion')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

$conn->close();
?>
<html>
    <head>
    </head>
    <body>
        <h1>Lista de peliculas</h1>
        <table border=1>
            <tr>
                <td>Pelicula</td>
                <td>ISAN</td>
                <td>Año</td>
                <td>Valoracion</td>
            </tr>
        </table><br><br>
        <form method="POST" action="Peliculas.php">
            <label for="pelicula">Nombre de la Pelicula:</label>
            <input type="text" id="pelicula" name="pelicula" required><br><br>
            <label for="ISAN">ISAN:</label>
            <input type="text" id="isan" name="isan" required><br><br>
            <label for="año">Año:</label>
            <input type="date" id="año" name="año" required><br><br>
            <label for="valoracion">Valoracion:</label>
            <select id="valoracion" name="valoracion">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br><br>
            <button type="submit">Enviar Formulario</button>
        </form>
    </body>
</html>
