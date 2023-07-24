<?php
include("conexionBD.php");

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = $mysqli->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION["id"]=$row["id"];
    $_SESSION["name"]=$row["name"];
    $_SESSION["lastname"]=$row["lastname"];
    $_SESSION["username"]=$row["username"];
    $_SESSION["mail"]=$row["mail"];
    header("Location: home.php");
}else{
    echo"Datos incorrectos";
}

$mysqli->close();

?>