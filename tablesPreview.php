<?php
include 'partials/header.php';
include 'conexionBD.php';
$sql = " SELECT * FROM alumnos";
$result = $mysqli->query($sql);
$mysqli->close();

?>

<body>
  <h1 id="example">Preview de datos del alumno</h1>
  <div class="table-responsive-sm">
    <table id="example" class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th>CURP</th>
          <th>noControl</th>
          <th>Nombre completo</th>
          <th>Numero de casa</th>
          <th>Numero de celular</th>
          <th>Acciones</th>
        </tr>


        <?php
        while ($rows = $result->fetch_assoc()) {
        ?>

          <tr>
            <td><?php echo $rows['curp']; ?></td>
            <td><?php echo $rows['noControl']; ?></td>
            <td><?php echo $rows['apellidoPaterno'] . '  ' . $rows['apellidoMaterno'] . '  ' . $rows['nombres']; ?></td>
            <td><?php echo $rows['numeroCasaAlumno']; ?></td>
            <td><?php echo $rows['numeroCelularAlumno']; ?></td>
            
          </tr>

        <?php
        }
        ?>



    </table>
    <br><br><br>
  </div>

</body>

<?php
// include 'partials/footer.php';
?>

</html>