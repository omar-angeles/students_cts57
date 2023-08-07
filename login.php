<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "students_cts57");
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    
    //var_dump($_SESSION);die;
    // Verificación del usuario y contraseña
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION["nombreRol"] = $row["nombreRol"];
        
        // Redirigir según el rol
        if ($row["nombreRol"] === "Administrador") {
            header("Location: homeAdm.php");
        } else if ($row["nombreRol"]==="ControlEscolar"){
            header("Location: homeCtrlEsc.php");
        } else if ($row["nombreRol"]==="Orientacion"){
            header("Location: homeOrientacion.php");
        }
        else{
            header("Location: index.php");
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
    
    $conn->close();
}
?>
