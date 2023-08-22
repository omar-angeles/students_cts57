<!-- Código que muestra la pestaña de "inicio/home" por parte del rol de Control Escolar. -->
<?php include("partials/header.php"); ?>

<body class="table-responsive">
  <br>
  <div class="row inicial ">

    <div id="example" class="col-lg-6">
      <div class="card border-success">
        <div class="card-header bg-success text-white">
          Cargar información por documento de excel.
        </div>
        <div class="card-body">
          <p class="card-text">Con esta opción, usted puede cargar la información mediante una plantilla de Excel.</p>
          <form action="ctrl/archivosTempExcel/temp.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="archivo" required>
            <center><br><button type="submit" id="excel" class="btn btn-outline-success"><i class="far fa-file-excel"></i> Subir archivo</button></center>
          </form>
        </div>
      </div>
      <br>
    </div>

    <div id="example" class="col-lg-6">
      <div class="card border-info">
        <div class="card-header bg-info text-white">
          Listado de alumnos en base de datos
        </div>
        <div class="card-body">
          <p class="card-text">Con esta opción, usted puede ver el listado de alumnos que se encuentra en la base de datos actualmente</p>
          <center><a href="tablesPreview_ControlEscolar.php?nume=1" class="btn btn-outline-info">Listado de alumnos actuales</a></center>
        </div>
      </div>
      <br>
    </div>

    <div id="example" class="col-lg-6">
      <div class="card border-dark">
        <div class="card-header bg-dark text-white">
          Listado de campos en base de datos
        </div>
        <div class="card-body">
          <p class="card-text">Con esta opción, usted puede ver el listado de campos y hacer una comparativa de los campos que va a subir a la base de datos con los campos de su archivo excel</p>
          <center><a href="datosBDView_ControlEscolar.php?nume=1.php" class="btn btn-outline-dark">Listado de campos actuales</a></center>
        </div>
      </div>
      <br>
    </div>

  </div>
    
  </div>
  <br><br><br><br><br><br>
</body>




<?php include("partials/footer.php"); ?>

</html>