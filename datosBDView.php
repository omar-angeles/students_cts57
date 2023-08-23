<!-- Código que muestra la pestaña de "listado de datos" que carga los de la base de datos, y el excel, por parte del administrador. -->
<?php include("partials/header.php"); ?>
<?php include("conexionBD.php"); ?>
<?php include("leerDatos.php"); ?>
<?php error_reporting(0); ?>
<body id="example">
  
    <div class="center mt-1">
    <div class="card pt-3">
      <div class="container-fluid p-2">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre del campo en la base de datos:</th>
              <th scope="col">Nombre del campo en el excel:</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($_REQUEST["nume"] == "") {
              $_REQUEST["nume"] = "1";
            }
            $articulos = mysqli_query($mysqli, "SELECT * FROM Information_Schema.Columns WHERE TABLE_NAME = 'alumnos';  ;");
            $num_registros = @mysqli_num_rows($articulos);
            $registros = '10';
            $pagina = $_REQUEST["nume"];
            if (is_numeric($pagina))
              $inicio = (($pagina - 1) * $registros);
            else
              $inicio = 0;
            $busqueda = mysqli_query($mysqli, "SELECT * FROM Information_Schema.Columns WHERE TABLE_NAME = 'alumnos';"); //LIMIT $inicio,$registros
            $paginas = ceil($num_registros / $registros);
            ?>
            <h5 class="card-tittle">Resultados (<?php echo $num_registros; ?>)
            <div id="left"><a href="homeAdm.php" class="btn btn-secondary btn-block">Regresar</a></div><br><br>
          </h5>
            <div class="container_card">
              <?php $encabezadosExc = leerDatos();?>
              <?php while ($resultado = mysqli_fetch_assoc($busqueda)) {
                $encabezadosDB[] = $resultado["COLUMN_NAME"];
              ?>
              <?php } ?>
                  <?php for($col = 0; $col < count($encabezadosExc)-1; $col++) {
                    if (!empty($num)) {
                      $num = $num++;
                    } else {
                      $num = '0';
                    }
                    $num++;
                    echo "<tr>";
                    echo "<th scope='row'>" . $num . "</th>";
                    echo "<td>" . $encabezadosDB[$col] . "</td>";
                    echo "<td>" . $encabezadosExc[$col] . "</td>";
                    echo "</tr>";
                  } ?>
          </tbody>
        </table>
      </div>
    </div>

  <!-- paginacion //////////////////////////////////////-->
  <!--<div class="container-fluid  col-12">
      <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">
        <li class="page-item">
          </*?php
          if ($_REQUEST["nume"] == "1") {
            $_REQUEST["nume"] == "0";
            echo  "";
          } else {
            if ($pagina > 1)
              $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='datosBDView_test.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";
            echo "<li class='page-item '><a class='page-link' href='datosBDView_test.php?nume=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
          }
          echo "<li class='page-item active'><a class='page-link' >" . $_REQUEST["nume"] . "</a></li>";
          $sigui = $_REQUEST["nume"] + 1;
          $ultima = $num_registros / $registros;
          if ($ultima == $_REQUEST["nume"] + 1) {
            $ultima == "";
          }
          if ($pagina < $paginas && $paginas > 1)
            echo "<li class='page-item'><a class='page-link' href='datosBDView_test.php?nume=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";
          if ($pagina < $paginas && $paginas > 1)
            echo "
              <li class='page-item'><a class='page-link' aria-label='Next' href='datosBDView_test.php?nume=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
              </li>";
          ?*/>
      </ul>
    </div> -->
    <!-- end paginacion ///////////////////////// --> 
  </div><br><br><br><br>

</body>

<?php include("partials/footer.php"); ?>

</html>