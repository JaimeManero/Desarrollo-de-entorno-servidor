<?php
session_start();

$servername = "db";
$username = "root";
$password = "root";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $correo = trim($_POST['correo']);
    $pass = $_POST['pass'];
}
$sql = "SELECT nombre FROM register where email = '$correo' and contra = '$pass'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$_SESSION["nombre"]= $row["nombre"];
header("Location: 1.php");
$conn->close();
?>
