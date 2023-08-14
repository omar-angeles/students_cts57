<?php
require '../conexionBD.php';
// require 'procesamientoExcel.php';


function validacionCURP($mysqli, $curp){
    $sql = "SELECT * FROM alumnos WHERE curp = '$curp'";

}

echo validacionCURP($mysqli, 'ZAAO010828HMCVNMA4');


?>