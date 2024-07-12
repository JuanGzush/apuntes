<?php

function createTableFromArray($array): string
{
    $table = '<table>';

    // Añade el Thead
    $table .= <<<EOF
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">country</th>
                            <th scope="col">firstname</th>
                            <th scope="col">surname</th>
                            <th scope="col">age</th>
                        </tr> 
                    </thead>
               EOF;

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

function transformArray($array): array
{
    // Se crea el array que devolverá la función
    $transformedArray = [];
    // Se recorre cada array unidimensional
    foreach ($array as $auxArray) {
        // Se utiliza un array temporal para cada array unidimensional del nuevo array bidimensional
        $tempArray = [];
        // Se recorren los elementos de cada array unidimensional
        foreach ($auxArray as $key => $value) {
            // Solo se invoca el método si la clave coincide con el país
            if ($key === 'country') {
                // Se establece en una variable el país según el código
                $country = setCountry($value);

                $tempArray[$key] = $country;
            } else {
                $tempArray[$key] = $value;
            }
        }

        // Se añade el array unidimensional al array bidimensional
        $transformedArray[] = $tempArray;
    }

    return $transformedArray;
}

function setCountry($countryCode): string
{
    return match ($countryCode) {
        0 => 'Wales',
        1 => 'USA',
        2 => 'Ireland',
        3 => 'Scotland',
        4 => 'Australia',
        5 => 'England',
        default => 'code not covered',
    };
}
