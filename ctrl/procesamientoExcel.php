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

}
echo 'Carga completa';
header("Location: http://localhost/proyectos/students_cts57/tablesPreview.php");
            