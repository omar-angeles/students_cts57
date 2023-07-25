<?php
session_start();
if (!isset($_SESSION['name']) || !isset($_SESSION['lastname'])) { header("Location: index.php"); exit();}
$nombre = $_SESSION['name'];
$apellido = $_SESSION['lastname'];
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>DGETI 057</title>
</head>
<header>
    <h1 id="blanco">DGETI 57</h1>
    <p id="blanco">Bienvenido, <?php echo $nombre . ' ' . $apellido; ?></p>
    <form action="cerrar_sesion.php" method="POST"> <button type="submit" class="btn btn-primary btn-block">Cerrar sesión</button> </form>
</header>
