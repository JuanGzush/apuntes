<?php

function getEducationalOfferings(array $rows): string
{
    $list = '';

    foreach ($rows as $row) {
        $list .= '<ul>';

        foreach ($row as $header => $column) {
            if ($header === 'fechaLey') {
                $lawDate = substr($column, 8, 2)
                    . '-' . substr($column, 5, 2)
                    . '-' . substr($column, 0, 4);
                $list .= "<li>Fecha de entrada en vigor de la ley: $lawDate</li>";
            } else {
                $list .= "<li>$column</li>";
            }
        }

        $list .= '<li>';
        $list .= "<div><a href=\"../pages/educational_offering_edit.php?codOe=$row[codOe]\" class=\"edit\"></a></div>";
        $list .= "<div><a href=\"../processes/process_educational_offering.php?operation=delete&codOe=$row[codOe]\" class=\"delete\"></a></div>";
        $list .= "<div><a href=\"../pages/course_list.php?codOe=$row[codOe]\" class=\"courses\">Cursos</a></div>";
        $list .= '</li>';

        $list .= '</ul>';
    }

    return $list;
}

function getSubjects(array $rows): string
{
    $list = '';

    foreach ($rows as $row) {
        $list .= '<ul>';

        foreach ($row as $header => $column) {
            if ($header === 'horasSemanales') {
                $list .= "<li>Horas semanales: $column</li>";
            } else if ($header === 'horasTotales') {
                $list .= "<li>Horas totales: $column</li>";
            } else {
                $list .= "<li>$column</li>";
            }
        }

        $list .= '<li>';
        $list .= "<div><a href=\"../pages/subject_edit.php?codAsig=$row[codAsig]\" class=\"edit\"></a></div>";
        $list .= "<div><a href=\"../processes/process_subject.php?operation=delete&codAsig=$row[codAsig]\" class=\"delete\"></a></div>";
        $list .= '</li>';

        $list .= '</ul>';
    }

    return $list;
}

function getTeachers(array $rows): string
{
    $list = '';

    foreach ($rows as $row) {
        $list .= '<ul>';

        foreach ($row as $header => $column) {
            if ($header === 'nombre') {
                $list .= "<li>$column";
            } else if ($header === 'apellidos') {
                $list .= " $column</li>";
            } else if ($header === 'fechaAlta') {
                $dischargeDate = substr($column, 8, 2)
                    . '-' . substr($column, 5, 2)
                    . '-' . substr($column, 0, 4);
                $list .= "<li>Fecha de alta: $dischargeDate</li>";
            } else {
                $list .= "<li>$column</li>";
            }
        }

        $list .= '<li>';
        $list .= "<div><a href=\"../pages/teacher_edit.php?codProf=$row[codProf]\" class=\"edit\"></a></div>";
        $list .= "<div><a href=\"../processes/process_teacher.php?operation=delete&codProf=$row[codProf]\" class=\"delete\"></a></div>";
        $list .= '</li>';

        $list .= '</ul>';
    }

    return $list;
}

function getCourses(array $rows): string
{
    $list = '';

    foreach ($rows as $row) {
        $list .= '<ul>';

        foreach ($row as $header => $column) {
            if ($header === 'codOe') {
                $list .= "<li>$column";
            } else if ($header === 'codCurso') {
                $list .= " $column</li>";
            } else if ($header === 'nombre') {
                $list .= "<li>Tutor: $column";
            } else {
                $list .= " $column</li>";
            }
        }

        $list .= '<li>';
        $list .= "<div><a href=\"../pages/course_edit.php?codOe=$row[codOe]&codCurso=$row[codCurso]\" class=\"edit\"></a></div>";
        $list .= "<div><a href=\"../processes/process_course.php?operation=delete&codOe=$row[codOe]&codCurso=$row[codCurso]\" class=\"delete\"></a></div>";
        $list .= "<div><a href=\"../pages/schedule_list.php?codOe=$row[codOe]&codCurso=$row[codCurso]\" class=\"schedule\">Horario</a></div>";
        $list .= "<div><a href=\"../pages/distribution_list.php?codOe=$row[codOe]&codCurso=$row[codCurso]\" class=\"distribution\">Reparto</a></div>";
        $list .= '</li>';

        $list .= '<li>';
        $list .= "<div><a href=\"../pages/schedule_table.php?codOe=$row[codOe]&codCurso=$row[codCurso]\" class=\"schedule_table\">Tabla de horario</a></div>";
        $list .= "<div><a href=\"../pages/distribution_table.php?codOe=$row[codOe]&codCurso=$row[codCurso]\" class=\"distribution_table\">Tabla de reparto</a></div>";
        $list .= '</li>';

        $list .= '</ul>';
    }

    return $list;
}

function getExclusiveTeachersSelect(array $rowsOne, array $rowsTwo, string $id, string $name): string
{
    $select = '';
    $select .= "<select id=\"$id\" name=\"$name\">";
    $select .= '<option value="">Elige un profesor</option>';

    foreach ($rowsOne as $row) {
        $isCodeInserted = false;

        foreach ($rowsTwo as $auxArray) {
            if (in_array($row['codProf'], $auxArray)) {
                $isCodeInserted = true;
                break;
            }
        }

        if (!$isCodeInserted) {
            $select .= "<option value=\"$row[codProf]\">$row[nombre] $row[apellidos]</option>";
        }
    }

    $select .= '</select>';

    return $select;
}

function getScheduleEntries(array $rows): string
{
    $list = '';

    foreach ($rows as $row) {
        $list .= '<ul>';

        foreach ($row as $header => $column) {
            if ($header === 'codOe') {
                $list .= "<li>$column";
            } else if ($header === 'codCurso') {
                $list .= " $column</li>";
            } else if ($header === 'nombre') {
                $list .= "<li>$column</li>";
            } else if ($header === 'dia') {
                $list .= "<li>$column: ";
            } else if ($header === 'horaInicio') {
                $list .= "$column - ";
            } else if ($header === 'horaFin') {
                $list .= "$column</li>";
            }
        }

        $list .= "<li><div><a href=\"../processes/process_schedule.php?operation=delete&codOe=$row[codOe]&codCurso=$row[codCurso]&codTramo=$row[codTramo]&codAsig=$row[codAsig]\" class=\"delete\"></a></div></li>";

        $list .= '</ul>';
    }

    return $list;
}

function getTimeSlotsSelect(array $rows, string $id, string $name): string
{
    $select = '';
    $select .= "<select id=\"$id\" name=\"$name\">";
    $select .= '<option value="">Elige un tramo</option>';

    foreach ($rows as $row) {
        $select .= "<option value=\"$row[codTramo]\">$row[codTramo]</option>";
    }

    $select .= '</select>';

    return $select;
}

function getSubjectsSelect(array $rows, string $id, string $name): string
{
    $select = '';
    $select .= "<select id=\"$id\" name=\"$name\">";
    $select .= '<option value="">Elige una asignatura</option>';

    foreach ($rows as $row) {
        $select .= "<option value=\"$row[codAsig]\">$row[nombre]</option>";
    }

    $select .= '</select>';

    return $select;
}

function getDistributionEntries(array $rows): string
{
    $list = '';

    foreach ($rows as $row) {
        $list .= '<ul>';

        foreach ($row as $header => $column) {
            if ($header === 'codOe') {
                $list .= "<li>$column";
            } else if ($header === 'codCurso') {
                $list .= " $column</li>";
            } else if ($header === 'nombre') {
                $list .= "<li>$column ";
            } else if ($header === 'apellidos') {
                $list .= "$column</li>";
            } else if ($header === 'codAsig') {
                $list .= "<li>$column</li>";
            }
        }

        $list .= '<li>';
        $list .= "<div><a href=\"../pages/distribution_edit.php?codOe=$row[codOe]&codCurso=$row[codCurso]&codAsig=$row[codAsig]\" class=\"edit\"></a></div>";
        $list .= "<div><a href=\"../processes/process_distribution.php?operation=delete&codOe=$row[codOe]&codCurso=$row[codCurso]&codAsig=$row[codAsig]&codProf=$row[codProf]\" class=\"delete\"></a></div>";
        $list .= '</li>';

        $list .= '</ul>';
    }

    return $list;
}

function getTeachersSelect(array $rows, string $id, string $name): string
{
    $select = '';
    $select .= "<select id=\"$id\" name=\"$name\">";
    $select .= '<option value="">Elige un profesor</option>';

    foreach ($rows as $row) {
        $select .= "<option value=\"$row[codProf]\">$row[nombre] $row[apellidos]</option>";
    }

    $select .= '</select>';

    return $select;
}

const NUM_OF_DAYS = 5;

function createScheduleTable(array $rows, string $caption, $columnHeaders): string
{
    $num = 0;
    $asterisk = false;

    $table = '<div class="table_container"><table>';

    $table .= "<caption>$caption</caption>";

    $table .= '<thead><tr>';

    foreach ($columnHeaders as $title) {
        $table .= "<th scope=\"col\">$title</th>";
    }

    $table .= '</tr></thead>';

    $table .= '<tbody>';

    foreach ($rows as $row) {

        if ($row['codAsig'][0] === '@') {
            $asterisk = true;
        } else {
            if ($num === 0) {
                $table .= '<tr>';
            }

            $table .= '<td>' . $row['codAsig'];

            if ($asterisk) {
                $table .= '*' . '</td>';
                $asterisk = false;
            } else {
                $table .= '</td>';
            }

            if ($num === NUM_OF_DAYS - 1) {
                $table .= '</tr>';
            }

            $num++;

            if ($num === NUM_OF_DAYS) {
                $num = 0;
            }
        }
    }

    $table .= '</table></div>';

    return $table;
}

function createDistributionTable(array $rows, string $caption, $columnHeaders): string
{
    $num = 0;
    $unfolding = false;
    $str = '';

    $table = '<div class="table_container"><table>';

    $table .= "<caption>$caption</caption>";

    $table .= '<thead><tr>';

    foreach ($columnHeaders as $title) {
        $table .= "<th scope=\"col\">$title</th>";
    }

    $table .= '</tr></thead>';

    $table .= '<tbody>';

    foreach ($rows as $row) {

        if ($row['codAsig'][0] === '@') {
            $unfolding = true;
            $str = $row['codProf'] . '/';
        } else {
            if ($num === 0) {
                $table .= '<tr>';
            }

            if ($unfolding) {
                $table .= '<td>' . $str . $row['codProf'] . '</td>';
                $unfolding = false;
                $str = '';
            } else {
                $table .= '<td>' . $row['codProf'] . '</td>';
            }

            if ($num === NUM_OF_DAYS - 1) {
                $table .= '</tr>';
            }

            $num++;

            if ($num === NUM_OF_DAYS) {
                $num = 0;
            }
        }
    }

    $table .= '</table></div>';

    return $table;
}
