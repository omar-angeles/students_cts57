<!-- Código que muestra la pestaña de "listado de alumnos" por parte del administrador. -->
<?php
include 'partials/header.php';
?>
<?php
include("conexionBD.php");
?>
<body id="example">
  <div class="center mt-1">
    <div class="card pt-3">
      <div class="container-fluid p-2">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">CURP</th>
              <th scope="col">noControl</th>´
              <th scope="col">Nombre completo</th>
              <th scope="col">Numero de casa</th>
              <th scope="col">Numero de celular</th>
            </tr>
          </thead>
          <tbody>
            <?php

            if ($_REQUEST["nume"] == "") {
              $_REQUEST["nume"] = "1";
            }
            $articulos = mysqli_query($mysqli, "SELECT * FROM alumnos  ;");
            $num_registros = @mysqli_num_rows($articulos);
            $registros = '10';
            $pagina = $_REQUEST["nume"];
            if (is_numeric($pagina))
              $inicio = (($pagina - 1) * $registros);
            else
              $inicio = 0;
            $busqueda = mysqli_query($mysqli, "SELECT * FROM alumnos LIMIT $inicio,$registros;");
            $paginas = ceil($num_registros / $registros);
            ?>
            <h5 class="card-tittle">Resultados (<?php echo $num_registros; ?>)
            <div id="left"><a href="homeAdm.php" class="btn btn-secondary btn-block">Regresar</a></div><br><br>
          </h5>
            <div class="container_card">
              <?php while ($resultado = mysqli_fetch_assoc($busqueda)) {
                if (!empty($num)) {
                  $num = $num++;
                } else {
                  $num = '0';
                }
                $num++;
              ?>
                <tr>
                  <th scope="row"><?php echo $num; ?></th>
                  <td><?php echo $resultado["curp"]; ?></td>
                  <td><?php echo $resultado["noControl"]; ?></td>
                  <td><?php echo $resultado['apellidoPaterno'] . '  ' . $resultado['apellidoMaterno'] . '  ' . $resultado['nombres']; ?></td>

                  <td><?php echo $resultado["numeroCasaAlumno"]; ?></td>
                  <td><?php echo $resultado["numeroCelularAlumno"]; ?></td>
                </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- paginacion //////////////////////////////////////-->
    <div class="container-fluid  col-12">
      <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">
        <li class="page-item">
          <?php
          if ($_REQUEST["nume"] == "1") {
            $_REQUEST["nume"] == "0";
            echo  "";
          } else {
            if ($pagina > 1)
              $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='tablesPreview.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";
            echo "<li class='page-item '><a class='page-link' href='tablesPreview.php?nume=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
          }
          echo "<li class='page-item active'><a class='page-link' >" . $_REQUEST["nume"] . "</a></li>";
          $sigui = $_REQUEST["nume"] + 1;
          $ultima = $num_registros / $registros;
          if ($ultima == $_REQUEST["nume"] + 1) {
            $ultima == "";
          }
          if ($pagina < $paginas && $paginas > 1)
            echo "<li class='page-item'><a class='page-link' href='tablesPreview.php?nume=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";
          if ($pagina < $paginas && $paginas > 1)
            echo "
              <li class='page-item'><a class='page-link' aria-label='Next' href='tablesPreview.php?nume=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
              </li>";
          ?>
      </ul>
    </div>
    <!-- end paginacion ///////////////////////// -->
  </div><br><br><br><br>
  </div>


  <!-- paginacion //////////////////////////////////////-->
  <div class="container-fluid  col-12">
      <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">
        <li class="page-item">
          <?php
          if ($_REQUEST["nume"] == "1") {
            $_REQUEST["nume"] == "0";
            echo  "";
          } else {
            if ($pagina > 1)
              $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='tablesPreview.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";
            echo "<li class='page-item '><a class='page-link' href='tablesPreview.php?nume=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
          }
          echo "<li class='page-item active'><a class='page-link' >" . $_REQUEST["nume"] . "</a></li>";
          $sigui = $_REQUEST["nume"] + 1;
          $ultima = $num_registros / $registros;
          if ($ultima == $_REQUEST["nume"] + 1) {
            $ultima == "";
          }
          if ($pagina < $paginas && $paginas > 1)
            echo "<li class='page-item'><a class='page-link' href='tablesPreview.php?nume=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";
          if ($pagina < $paginas && $paginas > 1)
            echo "
              <li class='page-item'><a class='page-link' aria-label='Next' href='tablesPreview.php?nume=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
              </li>";
          ?>
      </ul>
    </div>
    <!-- end paginacion ///////////////////////// -->
  </div><br><br><br><br>
</body>
<?php include("partials/footer.php"); ?>
</html>