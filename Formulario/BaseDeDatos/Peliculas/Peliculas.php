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
    $pelicula = trim($_POST['pelicula']);
    $isan = trim($_POST['isan']);
    $año = $_POST['año'];
    $valoracion = $_POST['valoracion'];

    if (strlen($isan) === 8) {
        $checkSql = "SELECT * FROM peliculas WHERE ISAN = '$isan'";
        $result = $conn->query($checkSql);

        if ($result->num_rows > 0) {
            if (empty($pelicula)) {
                $deleteSql = "DELETE FROM peliculas WHERE ISAN = '$isan'";
                if ($conn->query($deleteSql) === TRUE) {
                    echo "Película eliminada correctamente.";
                } else {
                    echo "Error al eliminar la película: " . $conn->error;
                }
            } else {
                $updateSql = "UPDATE peliculas SET pelicula = '$pelicula', año = '$año', puntuacion = '$valoracion' WHERE ISAN = '$isan'";
                if ($conn->query($updateSql) === TRUE) {
                    echo "Película actualizada correctamente.";
                } else {
                    echo "Error al actualizar la película: " . $conn->error;
                }
            }
        } else {
            if (!empty($pelicula) && !empty($año) && !empty($valoracion)) {
                $insertSql = "INSERT INTO peliculas (pelicula, ISAN, año, puntuacion) 
                              VALUES ('$pelicula', '$isan', '$año', '$valoracion')";
                if ($conn->query($insertSql) === TRUE) {
                    echo "Película insertada correctamente.";
                } else {
                    echo "Error al insertar la película: " . $conn->error;
                }
            } else {
                echo "Error: Todos los campos deben estar completos para insertar un nuevo registro.";
            }
        }
    } else {
        echo "Error: El ISAN debe tener exactamente 8 dígitos.";
    }
}

$query = "SELECT * FROM peliculas";
$result = $conn->query($query);
?>

<html>
    <head>
    </head>
    <body>
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

        <h1>Lista de películas</h1>
        <table border=1>
            <tr>
                <td>Pelicula</td>
                <td>ISAN</td>
                <td>Año</td>
                <td>Valoracion</td>
            </tr>
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['pelicula']) . "</td>"; // Escapar datos para seguridad
                    echo "<td>" . htmlspecialchars($row['ISAN']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['año']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['puntuacion']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay películas en la base de datos.</td></tr>";
            }
            ?>
        </table><br><br>
    </body>
</html>

<?php
$conn->close();
?>
