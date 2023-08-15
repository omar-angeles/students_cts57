<?php
require '../conexionBD.php';
// require 'procesamientoExcel.php';


function validacionCURP($mysqli, $curp){
    $sql = "SELECT * FROM alumnos WHERE curp = 'curp'";
    $ejectSQL = $mysqli->prepare($sql);
    $parametros = array($curp);
    $ejectSQL->execute($parametros);
    $registros = $ejectSQL->fetchAll();
    $contadorRegistros = count($registros);
    return $contadorRegistros;

}

?>