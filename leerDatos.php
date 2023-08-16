<?php
require 'vendor/autoload.php'; // Asegúrate de ajustar la ruta al archivo autoload.php

use PhpOffice\PhpSpreadsheet\IOFactory;

function leerEncabezadosDeTabla($archivoExcel, $hojaIndex = 0) {
    // Cargar el archivo Excel
    $spreadsheet = IOFactory::load($archivoExcel);
    
    // Seleccionar la hoja
    $hoja = $spreadsheet->getSheet($hojaIndex);
    
    // Leer la primera fila (encabezados)
    $encabezados = $hoja->getRowIterator(1, 1)->current()->toArray();
    
    return $encabezados;
}

// Ruta al archivo Excel
$archivoExcel = 'ctrl/archivosTempExcel/archivos/reinscripcion_alumnos.xlsx';

// Llamar a la función para leer los encabezados
$encabezados = leerEncabezadosDeTabla($archivoExcel);

// Imprimir los encabezados
print_r($encabezados);
?>