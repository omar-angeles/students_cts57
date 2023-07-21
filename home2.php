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
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Bienvenido</title>
</head>



<body>
  <header>
    <h1>DGETI 57</h1>
    <p>Bienvenido, <?php echo $nombre . ' ' . $apellido; ?></p>
    <form action="cerrar_sesion.php" method="POST"> <button type="submit" class="btn btn-primary btn-block">Cerrar sesión</button> </form>
  </header>
  <div id="title" class="title">
    <h1>Seleccionar datos:</h1>
    <form action="tables.php" method="POST">
        <button type="submit" class="btn btn-secondary btn-block">Continuar</button>
    </form>

  
                                
  <br>

  
  <footer>
    <p>Pie de página - Todos los derechos reservados &copy; 2023</p>
  </footer>
</body>

</html>