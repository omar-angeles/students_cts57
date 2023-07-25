<?php include("partials/header.php"); ?>

<body class="table-responsive">
  <br>
<div class="row inicial">
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
  </div>
  
  <div id="example" class="col-lg-6">
    
    <div class="card border-info">
      <div class="card-header bg-info text-white">
        Cargar información por documento de excel.
      </div>
      <div class="card-body">
        <p class="card-text">Con esta opción, usted puede ver el listado de alumnos que se encuentra en la base de datos actualmente</p>
          <center><a href="tablesPreview.php" class="btn btn-outline-info">Listado de alumnos actuales</a></center>
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br><br>
</body>


<?php include("partials/footer.php"); ?>

</html>