<!-- Código que realiza la conexión a la base de datos. -->
<?php
//Modificar con base a su proveedor de MySQL.
$host = 'localhost'; 
$usuario = 'root';
$contrasena = '';
$nombreBase = 'students_cts57';

$mysqli = new mysqli($host, $usuario, $contrasena, $nombreBase);

if ($mysqli->connect_errno){
    echo 'Fallo la conexion, revisar el log' . $mysqli->connect_error;
    die();
}

?>