<?php include("../../partials/header.php"); ?>

<head>
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/home.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<?php
$nombreArchivo = $_FILES['archivo']['name'];
$guardado = $_FILES['archivo']['tmp_name'];

if (!file_exists('archivos')) {
    mkdir('archivos', 0777, true);
    if (file_exists('archivos')) {
        if (move_uploaded_file($guardado, 'archivos/' . $nombreArchivo)) {
            echo "<br><br><div class='alert alert-success'><center><b>Se ha cargado correctamente el archivo, da click en siguiente para subir informacion a la base de datos</b></center></div>";

            echo '
            <center><p>Subir informacion a la base de datos</p>
            <form action="../procesamientoExcel.php" method="POST" enctype="multipart/form-data">
            <button>Siguiente</button></center>
            </form>';
            
            
        } else {
            echo "<br><br><div class='alert alert-danger'><center><b>El archivo no se pudo subir intentelo de nuevo</b></center></div>";

            echo '<center>
            <form action="../../home.php" method="POST" enctype="multipart/form-data">
            <button>Regresar</button></center>';
        }
    }
} else {
    if (move_uploaded_file($guardado, 'archivos/' . $nombreArchivo)) {
        echo "<br><br><div class='alert alert-success'><center><b>Se ha cargado correctamente el archivo, da click en siguiente para subir informacion a la base de datos</b></center></div>";

        echo '
        <center><p>Subir informacion a la base de datos</p>
        <form action="../procesamientoExcel.php" method="POST" enctype="multipart/form-data">
        <button>Siguiente</button></center>
        </form>';

    } else {
        echo "<br><br><div class='alert alert-danger'><center><b>El archivo no se pudo subir intentelo de nuevo</b></center></div>";

        echo '<center>
        <form action="../../home.php" method="POST" enctype="multipart/form-data">
        <button>Regresar</button></center>';
    }
}
?>

<?php include("../../partials/footer.php"); ?>
