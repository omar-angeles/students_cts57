<!-- Código que realiza la función de la insertación de datos, para entender el código, revisa el .txt llamado README.txt. -->
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
require 'funciones.php';

// Importamos las clases que vamos a utilizar para poder leer el archivo excel, en este caso se utilizo la libreria de PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

// Se obtiene el nombre del archivo que se subio
$nombreArchivo = 'archivosTempExcel/archivos/reinscripcion_alumnos.xlsx';
$documento = IOFactory::load($nombreArchivo);
$totalHojas = $documento->getSheetCount();

// Se obtiene la hoja actual
$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();
$letra = $hojaActual->getHighestColumn();

$numeroLetra = Coordinate::columnIndexFromString($letra);


// Este ciclo for se utiliza en caso de que el archivo excel tenga mas de una hoja, en este caso solo se utilizo una hoja

// for ($indiceHoja = 0; $indiceHoja < $totalHojas; $indiceHoja++) {
//     $hojaActual = $documento->getSheet($indiceHoja);


// Con un ciclo for se recorre cada fila del archivo excel que queramos insertar a la base de datos
for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) {
    $apellidoPaterno = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
    $apellidoMaterno = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
    $nombres = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
    $sexoAlumno = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
    $fotoAlumno = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
    $fechaNacimientoAlumno = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
    $edadAlumno = $hojaActual->getCellByColumnAndRow(9, $indiceFila);
    $numeroCelularAlumno = $hojaActual->getCellByColumnAndRow(10, $indiceFila);
    $numeroCasaAlumno = $hojaActual->getCellByColumnAndRow(11, $indiceFila);
    $curp = $hojaActual->getCellByColumnAndRow(12, $indiceFila);

    // Se verifica que la celda no este vacia, en caso de que este vacia se termina el ciclo for de ese registro y sigue con los siguientes campos
    $curpR = trim($curp);
    if ($curpR == "") {
        break;
    } else {
        $noControl = $hojaActual->getCellByColumnAndRow(13, $indiceFila);
        $ultimoSemestreAlumno = $hojaActual->getCellByColumnAndRow(14, $indiceFila);
        $turnoAlumno = $hojaActual->getCellByColumnAndRow(15, $indiceFila);
        $grupoAlumno = $hojaActual->getCellByColumnAndRow(16, $indiceFila);
        $especialidadAlumno = $hojaActual->getCellByColumnAndRow(17, $indiceFila);
        $becaBenito = $hojaActual->getCellByColumnAndRow(18, $indiceFila);
        $trabajaAlumno = $hojaActual->getCellByColumnAndRow(19, $indiceFila);
        $tipoSecundaria = $hojaActual->getCellByColumnAndRow(20, $indiceFila);

        $hablaLenguaIndigena = $hojaActual->getCellByColumnAndRow(22, $indiceFila);
        $domicilioAlumno = $hojaActual->getCellByColumnAndRow(23, $indiceFila);

        //Estos tienen datos nulos en la base de datos
        $entidadFederativa = $hojaActual->getCellByColumnAndRow(24, $indiceFila);
        $localidad = $hojaActual->getCellByColumnAndRow(25, $indiceFila);

        $codigoPostal = $hojaActual->getCellByColumnAndRow(27, $indiceFila);
        $noExterior = $hojaActual->getCellByColumnAndRow(28, $indiceFila);
        $noInterior = $hojaActual->getCellByColumnAndRow(29, $indiceFila);
        $descripcionCasa = $hojaActual->getCellByColumnAndRow(30, $indiceFila);

        $viveConPadres = $hojaActual->getCellByColumnAndRow(62, $indiceFila);
        $conQuienVive = $hojaActual->getCellByColumnAndRow(63, $indiceFila);
        $estatura = $hojaActual->getCellByColumnAndRow(64, $indiceFila);
        $peso = $hojaActual->getCellByColumnAndRow(65, $indiceFila);
        $servicioSeguro = $hojaActual->getCellByColumnAndRow(66, $indiceFila);
        $alumnoMedicado = $hojaActual->getCellByColumnAndRow(67, $indiceFila);
        $nombreEnfermedad = $hojaActual->getCellByColumnAndRow(68, $indiceFila);

        $alumnoSobresaliente = $hojaActual->getCellByColumnAndRow(71, $indiceFila);

        $tipoSobresaliente = $hojaActual->getCellByColumnAndRow(72, $indiceFila);
        $alumnoConTratamientoPsicologico = $hojaActual->getCellByColumnAndRow(73, $indiceFila);
        $documentoAlumnoPsicologico = $hojaActual->getCellByColumnAndRow(74, $indiceFila);

        $tipoTransporte = $hojaActual->getCellByColumnAndRow(75, $indiceFila);
        $tiempoTransporte = $hojaActual->getCellByColumnAndRow(76, $indiceFila);
        $totalTransporteSemanal = $hojaActual->getCellByColumnAndRow(77, $indiceFila);
        $nombreUniversidadFutura = $hojaActual->getCellByColumnAndRow(78, $indiceFila);

        $gastoUtiles = $hojaActual->getCellByColumnAndRow(82, $indiceFila);
        $gastoUniformes = $hojaActual->getCellByColumnAndRow(83, $indiceFila);
        $internetEnCasa = $hojaActual->getCellByColumnAndRow(84, $indiceFila);
        $dispositivoDisponibles = $hojaActual->getCellByColumnAndRow(85, $indiceFila);
        $reglamentoAlumno = $hojaActual->getCellByColumnAndRow(86, $indiceFila);
        $reglamentoTutor = $hojaActual->getCellByColumnAndRow(87, $indiceFila);

        $firmaAlumno = $hojaActual->getCellByColumnAndRow(88, $indiceFila);
        $firmaTutor = $hojaActual->getCellByColumnAndRow(89, $indiceFila);
        $estatusNSS = $hojaActual->getCellByColumnAndRow(90, $indiceFila);
        $numeroNSSAlumno = $hojaActual->getCellByColumnAndRow(91, $indiceFila);

        // algunos campos estan comentados porque no se encuentran en el archivo excel que esta en constante actualizacion, pero se siguen dejando

        // $localidadSeguroSocial = $hojaActual->getCellByColumnAndRow(89, $indiceFila);


        //Estos tienen datos nulos en la base de datos
        // $idCarrera = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
        // $idPariente = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
        // $idGrupo = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
        // $idDiscapacidad = $hojaActual->getCellByColumnAndRow(5, $indiceFila);

        // Una vez que tenemos los datos en las variables hacermos el insert a la base de datos
        $sql = "INSERT INTO alumnos (curp, noControl, apellidoPaterno, apellidoMaterno, nombres, sexoAlumno, fotoAlumno, fechaNacimientoAlumno, edadAlumno, ultimoSemestreAlumno, turnoAlumno, grupoAlumno, especialidadAlumno, becaBenito, trabajaAlumno, tipoSecundaria, hablaLenguaIndigena, domicilioAlumno, localidad, entidadFederativa, codigoPostal, noExterior, noInterior, descripcionCasa, viveConPadres, conQuienVive, estatura, peso, servicioSeguro, alumnoMedicado, nombreEnfermedad, alumnoSobresaliente, tipoDeSobreSaliente, alumnoConTratamientoPsicologico, documentoAlumnoPsicologico, tipoTransporte, tiempoTransporte, totalTransporteSemanal, nombreUniversidadFutura, gastoUtiles, gastoUniformes, internetEnCasa, dispositivoDisponibles, reglamentoAlumno, reglamentoTutor, firmaAlumno, firmaTutor, estatusNSS, numeroNSSAlumno, numeroCasaAlumno, numeroCelularAlumno) VALUES ('$curp', '$noControl', '$apellidoPaterno', '$apellidoMaterno', '$nombres', '$sexoAlumno', '$fotoAlumno', '$fechaNacimientoAlumno', '$edadAlumno', '$ultimoSemestreAlumno', '$turnoAlumno', '$grupoAlumno', '$especialidadAlumno', '$becaBenito', '$trabajaAlumno', '$tipoSecundaria', '$hablaLenguaIndigena', '$domicilioAlumno', '$localidad', '$entidadFederativa', '$codigoPostal', '$noExterior', '$noInterior', '$descripcionCasa', '$viveConPadres', '$conQuienVive', '$estatura', '$peso', '$servicioSeguro', '$alumnoMedicado', '$nombreEnfermedad', '$alumnoSobresaliente', '$tipoSobresaliente', '$alumnoConTratamientoPsicologico', '$documentoAlumnoPsicologico', '$tipoTransporte', '$tiempoTransporte', '$totalTransporteSemanal', '$nombreUniversidadFutura', '$gastoUtiles', '$gastoUniformes', '$internetEnCasa', '$dispositivoDisponibles', '$reglamentoAlumno', '$reglamentoTutor', '$firmaAlumno', '$firmaTutor', '$estatusNSS', '$numeroNSSAlumno', '$numeroCasaAlumno', '$numeroCelularAlumno')";
        $mysqli->query($sql);

        try {

            // En este try hacemos las validaciones de cada campo, en este caso utilizamos la funcion strlen para contar el numero de caracteres asi validamos que si el tamaño de la variable es mayor a 0 entonces si tiene datos y si no entonces no tiene datos y se le notifica al usuario que alumno no tiene datos en ese campo
            $curp = ($curp);
            $curpNo = strlen($curp);

            $noControl = ($noControl);
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

            // $localidadSeguroSocial = ($localidadSeguroSocial);
            // $localidadSeguroSocialNo = strlen($localidadSeguroSocial);

            $numeroCasaAlumno = ($numeroCasaAlumno);
            $numeroCasaAlumnoNo = strlen($numeroCasaAlumno);

            $numeroCelularAlumno = ($numeroCelularAlumno);
            $numeroCelularAlumnoNo = strlen($numeroCelularAlumno);

            // Aqui empiezan las validaciones de cada campo del excel
            if (($curpNo != 18)) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que el CURP no contiene el numero de caracteres apropiados.</div>';
            } else if ($noControlNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no ingreso su numero de control</div>';
            } else if ($apellidoPaternoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoMaterno . ' ' . ' debido a que no se ingreso el apellido paterno del alumno</div>';
            } else if ($apellidoMaternoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . ' debido a que no se ingreso el apellido materno del alumno</div>';
            } else if ($nombresNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el nombre del alumno</div>';
            } else if ($sexoAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el sexo del alumno</div>';
            } else if ($fotoAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el url de la foto del alumno</div>';
            } else if ($fechaNacimientoAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la fecha de nacimiento del alumno</div>';
            } else if ($edadAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la edad del alumno</div>';
            } else if ($ultimoSemestreAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el ultimo semestre del alumno</div>';
            } else if ($turnoAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el turno del alumno</div>';
            } else if ($grupoAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el grupo del alumno</div>';
            } else if ($especialidadAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la especialidad del alumno</div>';
            } else if ($becaBenitoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno tiene beca o no</div>';
            } else if ($trabajaAlumnoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno trabaja</div>';
            } else if ($tipoSecundariaNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el tipo de secundaria del alumno</div>';
            } else if ($hablaLenguaIndigenaNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno habla alguna lengua indigena</div>';
            } else if ($domicilioAlumnoNo < 4) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el domicilio del alumno</div>';
            } else if ($codigoPostalNo < 3) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el codigo postal del alumno</div>';
            } else if ($noExteriorNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el numero exterior del alumno</div>';
            } else if ($descripcionCasaNo < 4) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la descripcion de la casa del alumno</div>';
            } else if ($viveConPadresNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno vive con sus padres o no</div>';
            } else if ($estaturaNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la estatura del alumno</div>';
            } else if ($pesoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el peso del alumno</div>';
            } else if ($servicioSeguroNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno tiene algun servicio de seguro</div>';
            } else if ($alumnoMedicadoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno esta medicado</div>';
            } else if ($alumnoSobresalienteNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno es sobresaliente</div>';
            } else if ($tipoSobresalienteNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el url de la foto del alumno</div>';
            } else if ($alumnoConTratamientoPsicologicoNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno tiene algun tratamiento psicologico</div>';
            } else if ($tipoTransporteNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el tipo de transporte que utiliza el alumno</div>';
            } else if ($tiempoTransporteNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el tiempo que tarda el alumno en el transporte</div>';
            } else if ($totalTransporteSemanalNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el total del transporte semanal que utiliza el alumno</div>';
            } else if ($gastoUtilesNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el gasto en utiles del alumno</div>';
            } else if ($gastoUniformesNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el gasto de uniformes del alumno</div>';
            } else if ($internetEnCasaNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso si el alumno tiene internet en casa o no</div>';
            } else if ($dispositivoDisponiblesNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso cuantos dispositivos tiene el alumno disponibles</div>';
            } else if ($reglamentoAlumnoNo < 8) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el reglamento del alumno</div>';
            } else if ($firmaAlumnoNo < 8) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso la firma del alumno</div>';
            } else if ($estatusNSSNo < 1) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el estatus actual del alumno</div>';
            } else if ($numeroNSSAlumnoNo < 7) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el numero de seguro social del alumno</div>';
            } else if ($numeroCelularAlumnoNo < 7) {
                echo '<div class="alert alert-danger" role="alert">Error del alumn@ : ' . $nombres . ' ' . $apellidoPaterno . ' ' . $apellidoMaterno . ' debido a que no se ingreso el numero de celular del alumno</div>';
            }
        } catch (Exception $e) {
            die(print_r($e->getMessage()));
        }
    }
}

echo '</div>';
echo '<div class="alert alert-success" role="success">Carga completa checar los logs para revisar que se hayan cargado correctamente</div>';

