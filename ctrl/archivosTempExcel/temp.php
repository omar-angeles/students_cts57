<?php
$nombreArchivo = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

if (!file_exists('archivos')) {
    mkdir('archivos', 0777, true);
    if (file_exists('archivos')) {
        if (move_uploaded_file($guardado, 'archivos/' . $nombreArchivo)) {
            echo "<div class='alert alert-danger'><center><b>Se han cargado correctamente el archivo, ya puede subir los datos a la base de datos</b></center></div>";
            echo '

            <center><p>Subir informacion a la base de datos</p>
        <form action="../procesamientoExcel.php" method="POST" enctype="multipart/form-data">
        <button>Subir archivo</button></center>
        </form>
            
            ';

            //header("Location: http://localhost/proyectos/students_cts57/home.php");
            
        } else {
            echo "<div class='alert alert-danger'><center><b>El archivo no se pudo subir intentelo de nuevo</b></center></div>";

            echo '<center>
        <form action="../../home.php" method="POST" enctype="multipart/form-data">
        <button>Regresar</button></center>
        ';
        }
    }
} else {
    if (move_uploaded_file($guardado, 'archivos/' . $nombreArchivo)) {
        echo "<div class='alert alert-danger'><center><b>Se han cargado correctamente el archivo, ya puede subir los datos a la base de datos</b></center></div>";
        echo '

        <center><p>Subir informacion a la base de datos</p>
        <form action="../procesamientoExcel.php" method="POST" enctype="multipart/form-data">
        <button>Regresar</button></center>
        </form>
            
        ';

        //header("Location: http://localhost/proyectos/students_cts57/home.php");
    } else {
        echo "<div class='alert alert-danger'><center><b>El archivo no se pudo subir intentelo de nuevo</b></center></div>";

        echo '<center>
        <form action="../../home.php" method="POST" enctype="multipart/form-data">
        <button>Regresar</button></center>
        ';
    }
}
?>
