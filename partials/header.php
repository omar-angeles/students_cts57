<?php
session_start();
if (!isset($_SESSION['nombreRol'])){ 
  header("Location: index.php"); 
  exit();
}
$nombreRol = $_SESSION['nombreRol'];
// $nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>DGETI 057</title>
</head>

<script>
function myFunction() {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Modulo en desarrollo, regresa pronto:((',
    
});
}
</script>

<header>
    <h1 id="blanco">DGETI 57</h1>
    <p id="blanco">Bienvenido, <?php echo $nombreRol?></p>
    <form action="cerrar_sesion.php" method="POST"> <button type="submit" class="btn btn-primary btn-block">Cerrar sesión</button> </form>
</header>
