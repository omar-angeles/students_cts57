<?php include("partials/header.php"); ?>

<body>
  <div id="title" class="title">
    <h1>Subir archivo archivosTempExcel</h1>
    <form action="ctrl/archivosTempExcel/temp.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="archivo">
      <br>
  </div>
  <br>
  <button type="submit" class="btn btn-secondary btn-block">Subir archivo</button>
  </form>
  <br>
</body>
<?php include("partials/footer.php"); ?>

</html>