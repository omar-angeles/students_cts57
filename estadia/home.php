<?php

session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) {
    // Si no se ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: index.php");
    exit();


}

$nombre = $_SESSION['name'];
$apellido = $_SESSION['lastname'];

?>

<!DOCTYPE html>
<html>
<head>
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
  <title>Bienvenido</title>
  <style>
    body {
      background-color: white;
      color: white;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    
    header {
      background-color: #28A782;
      padding: 20px;
      text-align: center;
    }
    
    footer {
      background-color: #28A782;
      padding: 20px;
      text-align: center;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    button{
        float: right;
    }
  </style>
</head>
<body>
  <header>
    <h1>DGETI 57</h1>
    <p>Bienvenido,  <?php echo $nombre . ' ' . $apellido; ?></p>
    <form action="cerrar_sesion.php" method="POST"> <button type="submit" class="btn btn-primary btn-block">Cerrar sesión</button> </form>
  </header>
  
  <footer>
    <p>Pie de página - Todos los derechos reservados &copy; 2023</p>
  </footer>
</body>
</html>
