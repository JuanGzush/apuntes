<?php

function createTableFromArray(array $array, string $caption, array $columnHeaders): string
{
    $table = '<table>';

    // Añade el caption
    $table .= "<caption>$caption</caption>";

    // Añade el Thead
    $table .= '<thead><tr>';

    // Añade las distintas cabeceras de columna que se han pasado a la función
    foreach ($columnHeaders as $title) {
        $table .= "<th scope=\"col\">$title</th>";
    }

    $table .= '</tr></thead>';

    // Añade el Tbody
    $table .= '<tbody>';

    // Añade cada fila del Tbody
    foreach ($array as $auxArray) {
        $table .= '<tr>';

        //Añade las celdas de cada fila
        foreach ($auxArray as $value) {
            $table .= '<td>' . $value . '</td>';
        }

        $table .= '</tr>';
    }

    $table .= '</table>';

    return $table;
}
