<?php
$servername = "db";
$username = "root";
$contrasena = "root";
$dbname="mydatabase";

$conn = new mysqli($servername, $username, $contrasena, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $usuario=$_POST['usuario'];
    $correo=trim($_POST['correo']);
    $pass=$_POST['pass'];
}


$sql = "INSERT INTO registro (nombre, email, contra)
VALUES ('$usuario', '$correo', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  

    $conn->close();
?>
<html>
    <head>

    </head>
    <body>

    </body>
</html>