<?php

function validateInput($input): string
{
    return trim(htmlspecialchars($input));
}

function validateInputArray($inputArray): array
{
    $validatedInputArray = [];

    foreach ($inputArray as $value) {
        $validatedInputArray[] = trim(htmlspecialchars($value));
    }

    return $validatedInputArray;
}

function transformArray($array): array
{
    $transformedArray = [];

    foreach ($array as $auxArray) {
        $tempArray = [];

        foreach ($auxArray as $key => $value) {
            if ($key === 'country') {
                $tempArray[$key] = setCountry($value);
            } else {
                $tempArray[$key] = $value;
            }
        }

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

function arrayFilter(
    $array,
    $firstname,
    $surname,
    $age,
    $operator,
    $countries,
    $strict,
    $moreOneCountry
): array
{
    $filteredArray = [];

    foreach ($array as $auxArray) {
        $tempArray = $auxArray;

        foreach ($auxArray as $key => $value) {
            /*
             * Cada array debe superar hasta 4 filtros
             * Solo entra en cada filtro si para ese parámetro no tiene como valor cadena vacía o array vacío
             */

            // Filtro 1
            if ((!empty($firstname)) && !passesFirstNameFilter($firstname, $key, $value, $strict)) {
                $tempArray = [];
            }

            // Filtro 2
            if ((!empty($surname)) && !passesSurnameFilter($surname, $key, $value, $strict)) {
                $tempArray = [];
            }

            // Filtro 3
            if ((!empty($age)) && !passesAgeFilter($operator, $age, $key, $value)) {
                $tempArray = [];
            }

            // Filtro 4
            // Solo entra en el filtro si el usuario no ha seleccionado "Todos los países"
            if ((!empty($countries)) && mustPassCountriesFilter($countries) &&
                !passesCountriesFilter($countries, $key, $value, $moreOneCountry)
            ) {
                $tempArray = [];
            }
        }

        // Solo se añade el array temporal al array que devuelve la función si no está vacío
        if (!empty($tempArray)) {
            $filteredArray[] = $auxArray;
        }
    }

    return $filteredArray;
}


function passesFirstNameFilter($firstname, $key, $value, $strict): bool
{
    // Rama en la que se hace una comparación estricta
    if ($strict) {
        if (($key === 'firstname') &&
            (strcmp($value, $firstname) != 0)
        ) {
            return false;
        }
    } else { // Rama en la que no se hace una comparación estricta
        /*
         * strncasecmp: Compara dos string en un número determinado
         * de caracteres contando desde el principio de la cadena
         */
        if (($key === 'firstname') &&
            (strncasecmp($value, $firstname, strlen($firstname)) != 0)
        ) {
            return false;
        }
    }

    return true;
}

function passesSurnameFilter($surname, $key, $value, $strict): bool
{
    // Rama en la que se hace una comparación estricta
    if ($strict) {
        if (($key === 'surname') &&

            (strcmp($value, $surname) != 0)
        ) {
            return false;
        }
    } else { // Rama en la que no se hace una comparación estricta
        /*
         * strncasecmp: Compara dos string en un número determinado
         * de caracteres contando desde el principio de la cadena
         */
        if (($key === 'surname') &&
            (strncasecmp($value, $surname, strlen($surname)) != 0)
        ) {
            return false;
        }
    }

    return true;
}

function passesAgeFilter($operator, $age, $key, $value): bool
{
    // Rama en la que el usuario ha seleccionado un operador
    if (!empty($operator)) {
        switch ($operator) {
            case 'greater':
                if (($key === 'age') && ($value <= $age)) {
                    return false;
                }
                break;
            case 'lower':
                if (($key === 'age') && ($value >= $age)) {
                    return false;
                }
                break;
            case 'equals':
                if (($key === 'age') && ($value != $age)) {
                    return false;
                }
                break;
        }
    } else { // Rama en la que el usuario no ha seleccionado un operador

        if (($key === 'age') && (strcmp($value, $age) != 0)) {
            return false;
        }
    }

    return true;
}

function mustPassCountriesFilter($countries): bool
{
    if (is_array($countries) && in_array("all_countries", $countries)) {
        return false;
    } else if ((gettype($countries) === 'string') && ($countries === "all_countries")) {
        return false;
    }

    // Solo deberá superar el filtro si no se ha seleccionado "Todos los países"
    return true;
}

function passesCountriesFilter($countries, $key, $value, $moreOneCountry): bool
{
    // Rama en la que puede haber más de un país
    if ($moreOneCountry) {
        if ($key === 'country') {
            $counter = 0;

            foreach ($countries as $country) {
                if ($country != $value) {
                    $counter++;
                }
            }

            // Si el valor es distinto a todos los elementos del array, no supera el filtro
            if ($counter === sizeof($countries)) {
                return false;
            }
        }
    } else { // Rama en la que solo hay un país
        if (($key === 'country') &&
            (strcmp($value, $countries) != 0)
        ) {
            return false;
        }
    }

    return true;
}

function createTableFromArray($array): string
{
    $table = '<table>';

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

    $table .= '<tbody>';

    foreach ($array as $auxArray) {
        $table .= '<tr>';

        foreach ($auxArray as $value) {
            $table .= '<td>' . $value . '</td>';
        }

        $table .= '</tr>';
    }

    $table .= '</table>';

    return $table;
}
