<?php include("../partials/header.php"); ?>

<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/home.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<br>
<div id="left"><a href="../tablesPreview.php?nume=1" class="btn btn-secondary btn-block">Regresar</a></div><br><br>
<div class="alert alert-success" role="success">Recuerda revisar los logs de los alumnos para verificar que datos les hayan faltado</div>
<?php

require '../vendor/autoload.php';
require '../conexionBD.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

$nombreArchivo = 'archivosTempExcel/archivos/prueba.xlsx';
$documento = IOFactory::load($nombreArchivo);
$totalHojas = $documento->getSheetCount();

$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();
$letra = $hojaActual->getHighestColumn();

$numeroLetra = Coordinate::columnIndexFromString($letra);

// Recorrido dinamico de las celdas
// for($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++){
//     for($indiceColumna = 1; $indiceColumna <= $numeroLetra; $indiceColumna++){
//         $valor = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
        
//         echo $valor . ' ';

//     }
//     echo '<br/>';
//     echo '<br/>';
// }



for($indiceFila = 2; $indiceFila<=$numeroFilas; $indiceFila++){


    
    $curp = $hojaActual->getCellByColumnAndRow(11, $indiceFila);
    $curp = trim($curp);

    // empieza if de curp vacio
    // if($curp == ""){
    //     break;
    // }else{

        $noControl = $hojaActual->getCellByColumnAndRow(12, $indiceFila);
        $apellidoPaterno = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
        $apellidoMaterno = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
        $nombres = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
        $sexoAlumno = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
        $fotoAlumno = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
        $fechaNacimientoAlumno = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
        $edadAlumno = $hojaActual->getCellByColumnAndRow(9, $indiceFila);
        $ultimoSemestreAlumno = $hojaActual->getCellByColumnAndRow(13, $indiceFila);
        $turnoAlumno = $hojaActual->getCellByColumnAndRow(14, $indiceFila);
        $grupoAlumno = $hojaActual->getCellByColumnAndRow(15, $indiceFila);
        $especialidadAlumno = $hojaActual->getCellByColumnAndRow(16, $indiceFila);
        $becaBenito = $hojaActual->getCellByColumnAndRow(17, $indiceFila);
        $trabajaAlumno = $hojaActual->getCellByColumnAndRow(18, $indiceFila);
        $tipoSecundaria = $hojaActual->getCellByColumnAndRow(19, $indiceFila);
        $hablaLenguaIndigena = $hojaActual->getCellByColumnAndRow(21, $indiceFila);
        $domicilioAlumno = $hojaActual->getCellByColumnAndRow(22, $indiceFila);

        //Estos tienen datos nulos en la base de datos
        $localidad = $hojaActual->getCellByColumnAndRow(24, $indiceFila);
        $entidadFederativa = $hojaActual->getCellByColumnAndRow(24, $indiceFila);

        $codigoPostal = $hojaActual->getCellByColumnAndRow(26, $indiceFila);
        $noExterior = $hojaActual->getCellByColumnAndRow(27, $indiceFila);
        $noInterior = $hojaActual->getCellByColumnAndRow(28, $indiceFila);
        $descripcionCasa = $hojaActual->getCellByColumnAndRow(29, $indiceFila);

        $viveConPadres = $hojaActual->getCellByColumnAndRow(59, $indiceFila);
        $conQuienVive = $hojaActual->getCellByColumnAndRow(60, $indiceFila);
        $estatura = $hojaActual->getCellByColumnAndRow(61, $indiceFila);
        $peso = $hojaActual->getCellByColumnAndRow(62, $indiceFila);
        $servicioSeguro = $hojaActual->getCellByColumnAndRow(63, $indiceFila);
        $alumnoMedicado = $hojaActual->getCellByColumnAndRow(64, $indiceFila);
        $nombreEnfermedad = $hojaActual->getCellByColumnAndRow(65, $indiceFila);
        $alumnoSobresaliente = $hojaActual->getCellByColumnAndRow(68, $indiceFila);

        $tipoSobresaliente = $hojaActual->getCellByColumnAndRow(69, $indiceFila);
        $alumnoConTratamientoPsicologico = $hojaActual->getCellByColumnAndRow(70, $indiceFila);
        $documentoAlumnoPsicologico = $hojaActual->getCellByColumnAndRow(71, $indiceFila);

        $tipoTransporte = $hojaActual->getCellByColumnAndRow(72, $indiceFila);
        $tiempoTransporte = $hojaActual->getCellByColumnAndRow(73, $indiceFila);
        $totalTransporteSemanal = $hojaActual->getCellByColumnAndRow(74, $indiceFila);
        $nombreUniversidadFutura = $hojaActual->getCellByColumnAndRow(75, $indiceFila);

        $gastoUtiles = $hojaActual->getCellByColumnAndRow(79, $indiceFila);
        $gastoUniformes = $hojaActual->getCellByColumnAndRow(80, $indiceFila);
        $internetEnCasa = $hojaActual->getCellByColumnAndRow(81, $indiceFila);
        $dispositivoDisponibles = $hojaActual->getCellByColumnAndRow(82, $indiceFila);
        $reglamentoAlumno = $hojaActual->getCellByColumnAndRow(83, $indiceFila);
        $reglamentoTutor = $hojaActual->getCellByColumnAndRow(84, $indiceFila);

        $firmaAlumno = $hojaActual->getCellByColumnAndRow(85, $indiceFila);
        $firmaTutor = $hojaActual->getCellByColumnAndRow(86, $indiceFila);
        $estatusNSS = $hojaActual->getCellByColumnAndRow(87, $indiceFila);
        $numeroNSSAlumno = $hojaActual->getCellByColumnAndRow(88, $indiceFila);
        $localidadSeguroSocial = $hojaActual->getCellByColumnAndRow(89, $indiceFila);
        $numeroCasaAlumno = $hojaActual->getCellByColumnAndRow(90, $indiceFila);
        $numeroCelularAlumno = $hojaActual->getCellByColumnAndRow(10, $indiceFila);

        //Estos tienen datos nulos en la base de datos
        // $idCarrera = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
        // $idPariente = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
        // $idGrupo = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
        // $idDiscapacidad = $hojaActual->getCellByColumnAndRow(5, $indiceFila);

        $sql = "INSERT INTO alumnos (curp, noControl, apellidoPaterno, apellidoMaterno, nombres, sexoAlumno, fotoAlumno, fechaNacimientoAlumno, edadAlumno, ultimoSemestreAlumno, turnoAlumno, grupoAlumno, especialidadAlumno, becaBenito, trabajaAlumno, tipoSecundaria, hablaLenguaIndigena, domicilioAlumno, localidad, entidadFederativa, codigoPostal, noExterior, noInterior, descripcionCasa, viveConPadres, conQuienVive, estatura, peso, servicioSeguro, alumnoMedicado, nombreEnfermedad, alumnoSobresaliente, tipoDeSobreSaliente, alumnoConTratamientoPsicologico, documentoAlumnoPsicologico, tipoTransporte, tiempoTransporte, totalTransporteSemanal, nombreUniversidadFutura, gastoUtiles, gastoUniformes, internetEnCasa, dispositivoDisponibles, reglamentoAlumno, reglamentoTutor, firmaAlumno, firmaTutor, estatusNSS, numeroNSSAlumno, localidadSeguroSocial, numeroCasaAlumno, numeroCelularAlumno) VALUES ('$curp', '$noControl', '$apellidoPaterno', '$apellidoMaterno', '$nombres', '$sexoAlumno', '$fotoAlumno', '$fechaNacimientoAlumno', '$edadAlumno', '$ultimoSemestreAlumno', '$turnoAlumno', '$grupoAlumno', '$especialidadAlumno', '$becaBenito', '$trabajaAlumno', '$tipoSecundaria', '$hablaLenguaIndigena', '$domicilioAlumno', '$localidad', '$entidadFederativa', '$codigoPostal', '$noExterior', '$noInterior', '$descripcionCasa', '$viveConPadres', '$conQuienVive', '$estatura', '$peso', '$servicioSeguro', '$alumnoMedicado', '$nombreEnfermedad', '$alumnoSobresaliente', '$tipoSobresaliente', '$alumnoConTratamientoPsicologico', '$documentoAlumnoPsicologico', '$tipoTransporte', '$tiempoTransporte', '$totalTransporteSemanal', '$nombreUniversidadFutura', '$gastoUtiles', '$gastoUniformes', '$internetEnCasa', '$dispositivoDisponibles', '$reglamentoAlumno', '$reglamentoTutor', '$firmaAlumno', '$firmaTutor', '$estatusNSS', '$numeroNSSAlumno', '$localidadSeguroSocial', '$numeroCasaAlumno', '$numeroCelularAlumno')";
        $mysqli->query($sql);

        try{

        $curp = ($curp);
        $curpNo = strlen($curp);

        $noControl =($noControl);
        $noControlNo = strlen($noControl);

        $apellidoPaterno = ($apellidoPaterno);
        $apellidoPaternoNo = strlen($apellidoPaterno);

        $apellidoMaterno = ($apellidoMaterno);
        $apellidoMaternoNo = strlen($apellidoMaterno);

        $nombres = ($nombres);
        $nombresNo = strlen($nombres);

        $sexoAlumno = ($sexoAlumno);
        $sexoAlumnoNo = strlen($sexoAlumno);

        $fotoAlumno = ($fotoAlumno);
        $fotoAlumnoNo = strlen($fotoAlumno);

        $fechaNacimientoAlumno = ($fechaNacimientoAlumno);
        $fechaNacimientoAlumnoNo = strlen($fechaNacimientoAlumno);
        
        $edadAlumno = ($edadAlumno);
        $edadAlumnoNo = strlen($edadAlumno);

        $ultimoSemestreAlumno = ($ultimoSemestreAlumno);
        $ultimoSemestreAlumnoNo = strlen($ultimoSemestreAlumno);
        
        $turnoAlumno = ($turnoAlumno);
        $turnoAlumnoNo = strlen($turnoAlumno);

        $grupoAlumno = ($grupoAlumno);
        $grupoAlumnoNo = strlen($grupoAlumno);

        $especialidadAlumno = ($especialidadAlumno);
        $especialidadAlumnoNo = strlen($especialidadAlumno);

        $becaBenito = ($becaBenito);
        $becaBenitoNo = strlen($becaBenito);

        $trabajaAlumno = ($trabajaAlumno);
        $trabajaAlumnoNo = strlen($trabajaAlumno);

        $tipoSecundaria = ($tipoSecundaria);
        $tipoSecundariaNo = strlen($tipoSecundaria);

        $hablaLenguaIndigena = ($hablaLenguaIndigena);
        $hablaLenguaIndigenaNo = strlen($hablaLenguaIndigena);

        $domicilioAlumno = ($domicilioAlumno);
        $domicilioAlumnoNo = strlen($domicilioAlumno);

        // $localidad = ($localidad);
        // $localidadNo = strlen($localidad);

        // $entidadFederativa = ($entidadFederativa);
        // $entidadFederativaNo = strlen($entidadFederativa);

        $codigoPostal = ($codigoPostal);
        $codigoPostalNo = strlen($codigoPostal);

        $noExterior = ($noExterior);
        $noExteriorNo = strlen($noExterior);

        // $noInterior = ($noInterior);
        // $noInteriorNo = strlen($noInterior);

        $descripcionCasa = ($descripcionCasa);
        $descripcionCasaNo = strlen($descripcionCasa);

        $viveConPadres = ($viveConPadres);
        $viveConPadresNo = strlen($viveConPadres);

        $conQuienVive = ($conQuienVive);
        $conQuienViveNo = strlen($conQuienVive);

        $estatura = ($estatura);
        $estaturaNo = strlen($estatura);

        $peso = ($peso);
        $pesoNo = strlen($peso);

        $servicioSeguro = ($servicioSeguro);
        $servicioSeguroNo = strlen($servicioSeguro);

        $alumnoMedicado = ($alumnoMedicado);
        $alumnoMedicadoNo = strlen($alumnoMedicado);

        $nombreEnfermedad = ($nombreEnfermedad);
        $nombreEnfermedadNo = strlen($nombreEnfermedad);

        $alumnoSobresaliente = ($alumnoSobresaliente);
        $alumnoSobresalienteNo = strlen($alumnoSobresaliente);

        $tipoSobresaliente = ($tipoSobresaliente);
        $tipoSobresalienteNo = strlen($tipoSobresaliente);

        $alumnoConTratamientoPsicologico = ($alumnoConTratamientoPsicologico);
        $alumnoConTratamientoPsicologicoNo = strlen($alumnoConTratamientoPsicologico);

        // $documentoAlumnoPsicologico = ($documentoAlumnoPsicologico);
        // $documentoAlumnoPsicologicoNo = strlen($documentoAlumnoPsicologico);

        $tipoTransporte = ($tipoTransporte);
        $tipoTransporteNo = strlen($tipoTransporte);

        $tiempoTransporte = ($tiempoTransporte);
        $tiempoTransporteNo = strlen($tiempoTransporte);

        $totalTransporteSemanal = ($totalTransporteSemanal);
        $totalTransporteSemanalNo = strlen($totalTransporteSemanal);

        // $nombreUniversidadFutura = ($nombreUniversidadFutura);
        // $nombreUniversidadFuturaNo = strlen($nombreUniversidadFutura);
        
        $gastoUtiles = ($gastoUtiles);
        $gastoUtilesNo = strlen($gastoUtiles);

        $gastoUniformes = ($gastoUniformes);
        $gastoUniformesNo = strlen($gastoUniformes);

        $internetEnCasa = ($internetEnCasa);
        $internetEnCasaNo = strlen($internetEnCasa);

        $dispositivoDisponibles = ($dispositivoDisponibles);
        $dispositivoDisponiblesNo = strlen($dispositivoDisponibles);

        $reglamentoAlumno = ($reglamentoAlumno);
        $reglamentoAlumnoNo = strlen($reglamentoAlumno);

        $reglamentoTutor = ($reglamentoTutor);
        $reglamentoTutorNo = strlen($reglamentoTutor);

        $firmaAlumno = ($firmaAlumno);
        $firmaAlumnoNo = strlen($firmaAlumno);

        $firmaTutor = ($firmaTutor);
        $firmaTutorNo = strlen($firmaTutor);

        $estatusNSS = ($estatusNSS);
        $estatusNSSNo = strlen($estatusNSS);

        $numeroNSSAlumno = ($numeroNSSAlumno);
        $numeroNSSAlumnoNo = strlen($numeroNSSAlumno);

        $localidadSeguroSocial = ($localidadSeguroSocial);
        $localidadSeguroSocialNo = strlen($localidadSeguroSocial);

        $numeroCasaAlumno = ($numeroCasaAlumno);
        $numeroCasaAlumnoNo = strlen($numeroCasaAlumno);

        $numeroCelularAlumno = ($numeroCelularAlumno);
        $numeroCelularAlumnoNo = strlen($numeroCelularAlumno);


        if (($curpNo < 17) or ($curpNo > 18)) {
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que el CURP no contiene el numero de caracteres apropiados.</div>';
        }else if ($noControlNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se encuentran datos en la columna</div>';
        }else if ($apellidoPaternoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoMaterno . ' ' . ' debido a que no se ingreso el apellido paterno del alumno</div>';
        }else if ($apellidoMaternoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . ' debido a que no se ingreso el apellido materno del alumno</div>';
        }else if ($nombresNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el nombre del alumno</div>';
        }else if ($sexoAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el sexo del alumno</div>';
        }else if ($fotoAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el url de la foto del alumno</div>';
        }else if ($fechaNacimientoAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la fecha de nacimiento del alumno</div>';
        }else if ($edadAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la edad del alumno</div>';
        }else if ($ultimoSemestreAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el ultimo semestre del alumno</div>';
        }else if ($turnoAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el turno del alumno</div>';
        }else if ($grupoAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el grupo del alumno</div>';
        }else if ($especialidadAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la especialidad del alumno</div>';
        }else if ($becaBenitoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno tiene beca o no</div>';
        }else if ($trabajaAlumnoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno trabaja</div>';
        }else if ($tipoSecundariaNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el tipo de secundaria del alumno</div>';
        }else if ($hablaLenguaIndigenaNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno habla alguna lengua indigena</div>';
        }else if ($domicilioAlumnoNo<5){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el domicilio del alumno</div>';
        }else if ($codigoPostalNo<3){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el codigo postal del alumno</div>';
        }else if ($noExteriorNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el numero exterior del alumno</div>';
        }else if ($descripcionCasaNo<6){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la descripcion de la casa del alumno</div>';
        }else if ($viveConPadresNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno vive con sus padres o no</div>';
        }else if ($estaturaNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la estatura del alumno</div>';
        }else if ($pesoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el peso del alumno</div>';
        }else if ($servicioSeguroNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno tiene algun servicio de seguro</div>';
        }else if ($alumnoMedicadoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno esta medicado</div>';
        }else if ($alumnoSobresalienteNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno es sobresaliente</div>';
        }else if ($tipoSobresalienteNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el url de la foto del alumno</div>';
        }else if ($alumnoConTratamientoPsicologicoNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno tiene algun tratamiento psicologico</div>';
        }else if ($tipoTransporteNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el tipo de transporte que utiliza el alumno</div>';
        }else if ($tiempoTransporteNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el tiempo que tarda el alumno en el transporte</div>';
        }else if ($totalTransporteSemanalNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el total del transporte semanal que utiliza el alumno</div>';
        }else if ($gastoUtilesNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el gasto en utiles del alumno</div>';
        }else if ($gastoUniformesNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el gasto de uniformes del alumno</div>';
        }else if ($internetEnCasaNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno tiene internet en casa o no</div>';
        }else if ($dispositivoDisponiblesNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso cuantos dispositivos tiene el alumno disponibles</div>';
        }else if ($reglamentoAlumnoNo<8){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el reglamento del alumno</div>';
        }else if ($reglamentoTutorNo<8){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres .' ' .$apellidoPaterno . ' ' .$apellidoMaterno . ' debido a que no se ingreso el reglamento del tutor</div>';
        }else if ($firmaAlumnoNo<8){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' .$apellidoPaterno . ' ' .$apellidoMaterno . ' debido a que no se ingreso la firma del alumno</div>';
        }else if ($firmaTutorNo<8){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' .$apellidoPaterno . ' ' .$apellidoMaterno . ' debido a que no se ingreso la firma del tutor </div>';
        }else if ($estatusNSSNo<1){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' .$apellidoPaterno . ' ' .$apellidoMaterno . ' debido a que no se ingreso el estatus actual del alumno</div>';
        }else if ($numeroNSSAlumnoNo<7){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' .$apellidoPaterno . ' ' .$apellidoMaterno . ' debido a que no se ingreso el numero de seguro social del alumno</div>';
        }else if ($localidadSeguroSocialNo<3){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' .$apellidoPaterno . ' ' .$apellidoMaterno . ' debido a que no se ingreso la localidad del seguro social del alumno</div>';
        }else if ($numeroCasaAlumnoNo<7){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' .$apellidoPaterno . ' ' .$apellidoMaterno . ' debido a que no se ingreso el numero de casa del alumno</div>';
        }else if ($numeroCelularAlumnoNo<7){
            echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' .$apellidoPaterno . ' ' .$apellidoMaterno . ' debido a que no se ingreso el numero de celular del alumno</div>';
        }


        }
        catch(Exception $e){
            die(print_r($e->getMessage()));
        }

    // } termina if de curp vacio

        
}
echo '</div>';
echo '<div class="alert alert-success" role="success">Carga completa checar los logs para revisar que se hayan cargado correctamente</div>';
// header("Location: http://localhost/proyectos/students_cts57/tablesPreview.php?nume=1");
            