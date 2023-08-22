<!-- Código que realiza la validación de inicio de sesión, validando por roles e usuarios.-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<br>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Conexión a la base de datos, acomodar datos con base a su proveedor de MySQL.
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
        // echo '<div id="left"><a href="index.php" class="btn btn-secondary btn-block">Regresar</a></div><br><br><div class="alert alert-danger" role="alert">Usuario o contraseña incorrectos, intente de nuevo</div>';

        echo "
        <div class='alert alert-danger'>
        <a href='index.php' id=left class='btn btn-secondary btn-block'>Regresar</a>
        <center><b>Datos incorrectos, verificalos e intenta de nuevo</b><br><br><a href='index.php' id=left class='btn btn-secondary btn-block' hidden>Regresar</a></center>
        </div>
        ";
    }
    $conn->close();
}
?>
