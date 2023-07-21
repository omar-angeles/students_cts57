<?php
 
$table = 'data';
 
$primaryKey = 'curp';
 
$columns = array(
    array( 'db' =>curp, 'dt' => 1),
    array( 'db' =>noControl, 'dt' => 2),
    array( 'db' =>apellidoPaterno, 'dt' => 3),
    array( 'db' =>apellidoMaterno, 'dt' => 4),
array( 'db' =>nombres, 'dt' => 5),
array( 'db' =>sexoAlumno, 'dt' => 6),
array( 'db' =>fotoAlumno, 'dt' => 7),
array( 'db' =>fechaNacimientoAlumno, 'dt' => 8),
array( 'db' =>edadAlumno, 'dt' => 9),
array( 'db' =>ultimoSemestreAlumno, 'dt' => 10),
array( 'db' =>turnoAlumno, 'dt' => 11),
array( 'db' =>grupoAlumno, 'dt' => 12),
array( 'db' =>especialidadAlumnp, 'dt' => 13),
array( 'db' =>becaBenito, 'dt' => 14),
array( 'db' =>trabajaAlumno, 'dt' => 15),
array( 'db' =>tipoSecundaria, 'dt' => 16),
array( 'db' =>hablaLenguaIndigena, 'dt' => 17),
array( 'db' =>domicilioAlumno, 'dt' => 18),
array( 'db' =>localidad, 'dt' => 19),
array( 'db' =>entidadFederativa, 'dt' => 20),
array( 'db' =>codigoPostal, 'dt' => 21),
array( 'db' =>noExterior, 'dt' => 22),
array( 'db' =>noInterior, 'dt' => 23),
array( 'db' =>descripcionCasa, 'dt' => 24),
array( 'db' =>viveConPadres, 'dt' => 25),
array( 'db' =>conQuienVive, 'dt' => 26),
array( 'db' =>estatura, 'dt' => 27),
array( 'db' =>peso, 'dt' => 28),
array( 'db' =>servicioSeguro, 'dt' => 29),
array( 'db' =>alumnoMedicado, 'dt' => 30),
array( 'db' =>nombreEnfermedad, 'dt' => 31),
array( 'db' =>alumnoSobresaliente, 'dt' => 32),
array( 'db' =>tipoDeSobresaliente, 'dt' => 33),
array( 'db' =>alumnoCoratamientoPsicologico, 'dt' => 34),
array( 'db' =>documentoAlumnoPsicologico, 'dt' => 35),
array( 'db' =>tipoTransporte, 'dt' => 36),
array( 'db' =>tiempoTransporte, 'dt' => 37),
array( 'db' =>totalTransporteSemanal, 'dt' => 38),
array( 'db' =>nombreUniversidadFutura, 'dt' => 39),
array( 'db' =>gastoUtiles, 'dt' => 40),
array( 'db' =>gastoUniformes, 'dt' => 41),
array( 'db' =>internetEnCasa, 'dt' => 42),
array( 'db' =>dispositivoDisponibles, 'dt' => 43),
array( 'db' =>reglamentoAlumno, 'dt' => 44),
array( 'db' =>reglamentoTutor, 'dt' => 45),
array( 'db' =>firmaAlumno, 'dt' => 46),
array( 'db' =>firmaTutor, 'dt' => 47),
array( 'db' =>estatusNSS, 'dt' => 48),
array( 'db' =>numeroNSSAlumno, 'dt' => 49),
array( 'db' =>localidadSeguroSocial, 'dt' => 50),
array( 'db' =>numeroCasaAlumno, 'dt' => 51),
array( 'db' =>numeroCelularAlumno, 'dt' => 52)
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'test',
    'host' => 'localhost'
);
 
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);