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
      <div class="card border-warning">
        <div class="card-header bg-warning text-white">
          Justificantes de alumnos
        </div>
        <div class="card-body">
          <p class="card-text">Con esta opción, usted puede realizar justificantes</p>
          <center><a <a onclick="myFunction()" href="#" class="btn btn-outline-warning">Justificantes</a></center>
        </div>
      </div>
      <br>
    </div>
  </div>
  
  <div class="row inicial">
    

    <div id="example" class="col-lg-6">
      <div class="card border-danger">
        <div class="card-header bg-danger text-white">
          Reportes de alumnos
        </div>
        <div class="card-body">
          <p class="card-text">Con esta opción, usted puede realizar Reportes</p>
          <center><a <a onclick="myFunction()" href="#" class="btn btn-outline-danger">Reportes</a></center>
        </div>
      </div>
    </div>
    
  </div>
  <br><br><br><br><br><br>
</body>




<?php include("partials/footer.php"); ?>

</html>