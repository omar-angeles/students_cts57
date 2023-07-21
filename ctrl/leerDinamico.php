<?php

require '../vendor/autoload.php';
require 'conexionBD.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;


$nombreArchivo = 'archivosTempExcel/archivos/prueba.xlsx';
$documento = IOFactory::load($nombreArchivo);
$totalHojas = $documento->getSheetCount();

//si se utiliza mas de una hoja se debe de realizar un ciclo for para recorrer las hojas y utilizar la que tenga informarcion
// for ($indiceHoja = 0; $indiceHoja < $totalHojas; $indiceHoja++){
//     $hojaActual= $documento->getSheet($indiceHoja);
// }

$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();
$letra = $hojaActual->getHighestColumn();

$numeroLetra = Coordinate::columnIndexFromString($letra);


// Mostrar toda la info concatenada que iria a la BD y posteriormente insertaria
for($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++){
    for($indiceColumna = 1; $indiceColumna <= $numeroLetra; $indiceColumna++){
        $valor = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
        
        echo $valor . ' ';

    }
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
}
