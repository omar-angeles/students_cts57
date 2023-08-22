<!-- Código de funcionamiento que lee los datos de el excel para su muestra. -->
<?php
require 'vendor/autoload.php'; // Asegúrate de ajustar la ruta a autoload.php

use PhpOffice\PhpSpreadsheet\IOFactory;

function leerDatos(){
    $archivoExcel = 'ctrl/archivosTempExcel/archivos/reinscripcion_alumnos.xlsx'; // Cambia esto a la ruta de tu archivo Excel

    // Cargar el archivo Excel
    $spreadsheet = IOFactory::load($archivoExcel);
    $worksheet = $spreadsheet->getActiveSheet();

    // Obtener los encabezados (primera fila)
    $headers = [];
    $maxCol = $worksheet->getHighestColumn();
    //$maxColIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($maxCol);

    for ($col = 2; $col <= 97; $col++) {
        $cellValue = $worksheet->getCellByColumnAndRow($col, 1)->getValue();
        $headers[] = $cellValue;
    }
    return $headers;
    // Mostrar los encabezados verticalmente
    /*echo "<ul>";
    foreach ($headers as $header) {
        echo "<li>" . $header . "</li>";
    }
    echo "</ul>";*/
}
?>