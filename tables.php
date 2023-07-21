<!-- PHP code to establish connection with the localserver -->
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is students_cts57
$database = 'students_cts57';

// Server is localhost with
$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM alumnos";
$result = $mysqli->query($sql);
$mysqli->close();

if(isset($_POST['save']))
{
   $checkbox = $_POST['check'];         
        for($i=0;$i<count($checkbox);$i++){
        $check_id = $checkbox[$i];
        mysqli_query($conn,"insert into alumnos (category_id,subcategory_id) values ('1','".$check_id."')") or die(mysqli_error());
            echo "Data added success fully!";
       }
}
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Tabla de seleccion</title>
	<!-- CSS FOR STYLING THE PAGE -->
  <link rel="stylesheet" type="text/css" href="css/tables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" media="screen" />
  <script charset="utf8" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script charset="utf8" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
</head>
<body>
	<section>
		<h1>Seleccione los datos a insertar:</h1>
    <form method="post" action="">
    <input type="checkbox" id="checkItem" name="<?php echo $rows['curp'];?>" value="1">
        <input type="checkbox" id="checkItem" name="check[]" value="2">
        <input type="checkbox" id="checkItem" name="check[]" value="3">
        <input type="checkbox" id="checkItem" name="check[]" value="4">
        <button type="submit" class="btn btn-primary" style="width:200px" name="save">Submit</button>
    </form>
		<!-- TABLE CONSTRUCTION -->
		<!-- <table id="data">
    <tr>
    <th>curp</th>
				<th>noControl</th>
				<th>apellidoPaterno</th>
				<th>apellidoMaterno</th>
        <th>nombres</th>
        <th>sexoAlumno</th>
        <th>fotoAlumno</th>
        <th>fechaNacimientoAlumno</th>
        <th>edadAlumno</th>
        <th>ultimoSemestreAlumno</th>
        <th>turnoAlumno</th>
        <th>grupoAlumno</th>
        <th>especialidadAlumnp</th>
        <th>becaBenito</th>
        <th>trabajaAlumno</th>
        <th>tipoSecundaria</th>
        <th>hablaLenguaIndigena</th>
        <th>domicilioAlumno</th>
        <th>localidad</th>
        <th>entidadFederativa</th>
        <th>codigoPostal</th>
        <th>noExterior</th>
        <th>noInterior</th>
        <th>descripcionCasa</th>
        <th>viveConPadres</th>
        <th>conQuienVive</th>
        <th>estatura</th>
        <th>peso</th>
        <th>servicioSeguro</th>
        <th>alumnoMedicado</th>
        <th>nombreEnfermedad</th>
        <th>alumnoSobresaliente</th>
        <th>tipoDeSobresaliente</th>
        <th>alumnoCoratamientoPsicologico</th>
        <th>documentoAlumnoPsicologico</th>
        <th>tipoTransporte</th>
        <th>tiempoTransporte</th>
        <th>totalTransporteSemanal</th>
        <th>nombreUniversidadFutura</th>
        <th>gastoUtiles</th>
        <th>gastoUniformes</th>
        <th>internetEnCasa</th>
        <th>dispositivoDisponibles</th>
        <th>reglamentoAlumno</th>
        <th>reglamentoTutor</th>
        <th>firmaAlumno</th>
        <th>firmaTutor</th>
        <th>estatusNSS</th>
        <th>numeroNSSAlumno</th>
        <th>localidadSeguroSocial</th>
        <th>numeroCasaAlumno</th>
        <th>numeroCelularAlumno</th>
      </tr> -->
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['curp'];?></td>
				<td><?php echo $rows['noControl'];?></td>
				<td><?php echo $rows['apellidoPaterno'];?></td>
				<td><?php echo $rows['apellidoMaterno'];?></td>
        <td><?php echo $rows['nombres'];?></td>
        <td><?php echo $rows['sexoAlumno'];?></td>
        <td><?php echo $rows['fotoAlumno'];?></td>
        <td><?php echo $rows['fechaNacimientoAlumno'];?></td>
        <td><?php echo $rows['edadAlumno'];?></td>
        <td><?php echo $rows['ultimoSemestreAlumno'];?></td>
        <td><?php echo $rows['turnoAlumno'];?></td>
        <td><?php echo $rows['grupoAlumno'];?></td>
        <td><?php echo $rows['especialidadAlumno'];?></td>
        <td><?php echo $rows['becaBenito'];?></td>
        <td><?php echo $rows['trabajaAlumno'];?></td>
        <td><?php echo $rows['tipoSecundaria'];?></td>
        <td><?php echo $rows['hablaLenguaIndigena'];?></td>
        <td><?php echo $rows['domicilioAlumno'];?></td>
        <td><?php echo $rows['localidad'];?></td>
        <td><?php echo $rows['entidadFederativa'];?></td>
        <td><?php echo $rows['codigoPostal'];?></td>
        <td><?php echo $rows['noExterior'];?></td>
        <td><?php echo $rows['noInterior'];?></td>
        <td><?php echo $rows['descripcionCasa'];?></td>
        <td><?php echo $rows['viveConPadres'];?></td>
        <td><?php echo $rows['conQuienVive'];?></td>
        <td><?php echo $rows['estatura'];?></td>
        <td><?php echo $rows['peso'];?></td>
        <td><?php echo $rows['servicioSeguro'];?></td>
        <td><?php echo $rows['alumnoMedicado'];?></td>
        <td><?php echo $rows['nombreEnfermedad'];?></td>
        <td><?php echo $rows['alumnoSobresaliente'];?></td>
        <td><?php echo $rows['tipoDeSobresaliente'];?></td>
        <td><?php echo $rows['alumnoCotratamientoPsicologico'];?></td>
        <td><?php echo $rows['documentoAlumnoPsicologico'];?></td>
        <td><?php echo $rows['tipoTransporte'];?></td>
        <td><?php echo $rows['tiempoTransporte'];?></td>
        <td><?php echo $rows['totalTransporteSemanal'];?></td>
        <td><?php echo $rows['nombreUniversidadFutura'];?></td>
        <td><?php echo $rows['gastoUtiles'];?></td>
        <td><?php echo $rows['gastoUniformes'];?></td>
        <td><?php echo $rows['internetEnCasa'];?></td>
        <td><?php echo $rows['dispositivoDisponibles'];?></td>
        <td><?php echo $rows['reglamentoAlumno'];?></td>
        <td><?php echo $rows['reglamentoTutor'];?></td>
        <td><?php echo $rows['firmaAlumno'];?></td>
        <td><?php echo $rows['firmaTutor'];?></td>
        <td><?php echo $rows['estatusNSS'];?></td>
        <td><?php echo $rows['numeroNSSAlumno'];?></td>
        <td><?php echo $rows['localidadSeguroSocial'];?></td>
        <td><?php echo $rows['numeroCasaAlumno'];?></td>
        <td><?php echo $rows['numeroCelularAlumno'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
    <script type="text/javascript" charset="utf8" src="js/tables.js"></script>
	</section>
</body>

</html>
