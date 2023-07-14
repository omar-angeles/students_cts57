<?php

//conexion a la base de datos
$servername = "localhost";
$username = "root";
$password = "alondra1";
$dbname = "cetis";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die ("error de conexion: " . $conn->connect_error);

}

//obtener los valores enviados desde el formulario 
$username = $_POST['username'];
$password = $_POST['password'];

//consulta para verificar las credenciales
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    //Usuario y contraseña validos
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION["id"]=$row["id"];
    $_SESSION["name"]=$row["name"];
    $_SESSION["lastname"]=$row["lastname"];
    $_SESSION["username"]=$row["username"];
    $_SESSION["mail"]=$row["mail"];
    header("Location: home.php");
}else{
    //Usuario y contraseña incorrectos
    echo"Datos incorrectos";
}

$conn->close();

?>