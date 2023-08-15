<?php include("partials/header.php"); ?>
<?php include("conexionBD.php"); ?>

<body id="example">
  


    <div class="center mt-1">
    <div class="card pt-3">
      <div class="container-fluid p-2">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre del campo</th>
              <th scope="col">Tipo y longitud de campo</th>
              <th scope="col">Numero del campo en base de datos</th>

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
            $busqueda = mysqli_query($mysqli, "SELECT * FROM Information_Schema.Columns WHERE TABLE_NAME = 'alumnos' LIMIT $inicio,$registros;");
            $paginas = ceil($num_registros / $registros);
            ?>
            <h5 class="card-tittle">Resultados (<?php echo $num_registros; ?>)
            <div id="left"><a href="homeCtrlEsc.php" class="btn btn-secondary btn-block">Regresar</a></div><br><br>
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
                  <td><?php echo $resultado["COLUMN_NAME"]; ?></td>
                  <td><?php echo $resultado["COLUMN_TYPE"]; ?></td>
                  <td><?php echo $resultado["ORDINAL_POSITION"]; ?></td>
                  
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
            echo "<a class='page-link' aria-label='Previous' href='datosBDView_ControlEscolar.php?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";
            echo "<li class='page-item '><a class='page-link' href='datosBDView_ControlEscolar.php?nume=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
          }
          echo "<li class='page-item active'><a class='page-link' >" . $_REQUEST["nume"] . "</a></li>";
          $sigui = $_REQUEST["nume"] + 1;
          $ultima = $num_registros / $registros;
          if ($ultima == $_REQUEST["nume"] + 1) {
            $ultima == "";
          }
          if ($pagina < $paginas && $paginas > 1)
            echo "<li class='page-item'><a class='page-link' href='datosBDView_ControlEscolar.php?nume=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";
          if ($pagina < $paginas && $paginas > 1)
            echo "
              <li class='page-item'><a class='page-link' aria-label='Next' href='datosBDView_ControlEscolar.php?nume=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a>
              </li>";
          ?>
      </ul>
    </div>
    <!-- end paginacion ///////////////////////// -->
  </div><br><br><br><br>

</body>

<?php include("partials/footer.php"); ?>

</html>