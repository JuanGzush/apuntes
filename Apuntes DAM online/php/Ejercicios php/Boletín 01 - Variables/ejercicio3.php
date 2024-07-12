<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 03</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercise3.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <span>boletín variables</span>
        <span>ejercicio 03</span>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                $aad = 'AAD';
                $ddi = 'DEINT';
                $eie = 'EIE';
                $hlc = 'HLC';
                $pspro = 'PSPRO';
                $pmdmo = 'PMDMO';
                $sge = 'SGEMP';

                echo '<div class="tableContainer"><table>',
                '<caption>Horario</caption>',
                '<colgroup span="1"></colgroup>',
                '<colgroup span="5"></colgroup>',
                '<thead><tr><th scope="col"></th><th scope="col">LUNES</th><th scope="col">MARTES</th><th scope="col">MIÉRCOLES</th><th scope="col">JUEVES</th><th scope="col">VIERNES</th></tr></thead>',
                "<tbody><tr><th scope=\"row\">8:15 - 09:15</td><td class=\"interfaces\">$ddi</td><td class=\"empresa\">$eie</td><td class=\"hlc\">$hlc</td><td class=\"multihilo\">$pspro</td><td class=\"interfaces\">$ddi</td></tr>",
                "<tr><th scope=\"row\">9:15 - 10:15</td><td class=\"empresa\">$eie</td><td class=\"hlc\">$hlc</td><td class=\"empresa\">$eie</td><td class=\"empresa\">$eie</td><td class=\"interfaces\">$ddi</td></tr>",
                "<tr><th scope=\"row\">10:15 - 11:15</td><td class=\"hlc\">$hlc</td><td class=\"android\">$pmdmo</td><td class=\"datos\">$aad</td><td class=\"interfaces\">$ddi</td><td class=\"sge\">$sge</td></tr>",
                '<tr><th scope="row">11:15 - 11:45</td><td colspan="5">RECREO</td></tr>',
                "<tr><th scope=\"row\">11:45 - 12:45</td><td class=\"datos\">$aad</td><td class=\"android\">$pmdmo</td><td class=\"multihilo\">$pspro</td><td class=\"datos\">$aad</td><td class=\"android\">$pmdmo</td></tr>",
                "<tr><th scope=\"row\">15:45 - 13:45</td><td class=\"datos\">$aad</td><td class=\"interfaces\">$ddi</td><td class=\"interfaces\">$ddi</td><td class=\"datos\">$aad</td><td class=\"android\">$pmdmo</td></tr>",
                "<tr><th scope=\"row\">13:45 - 14:45</td><td class=\"sge\">$sge</td><td class=\"sge\">$sge</td><td class=\"interfaces\">$ddi</td><td class=\"sge\">$sge</td><td class=\"multihilo\">$pspro</td></tr></tody>",
                '</div scope="row"></table>';

                ?>
            </p>
        </article>
    </section>
    <section class="code">
        <article>
            <p>Código fuente:</p>
            <p>
                <?php

                highlight_string("
                    <?php 
                    \$aad = 'AAD';
                    \$ddi = 'DEIN';
                    \$eie = 'EIE';
                    \$hlc = 'HLC';
                    \$pspro = 'PSPRO';
                    \$pmdmo = 'PMDMO';
                    \$sge = 'SGEMP';

                    echo '<div class=\"tableContainer\"><table>',
                    '<caption>Horario</caption>',
                    '<colgroup span=\"1\"></colgroup>',
                    '<colgroup span=\"5\"></colgroup>',
                    '<thead><tr><th scope=\"col\"></th><th scope=\"col\">LUNES</th><th scope=\"col\">MARTES</th><th scope=\"col\">MIÉRCOLES</th><th scope=\"col\">JUEVES</th><th scope=\"col\">VIERNES</th></tr></thead>',
                    \"<tbody><tr><th scope=\"row\">8:15 - 09:15</td><td class=\"interfaces\">\$ddi</td><td class=\"empresa\">\$eie</td><td class=\"hlc\">\$hlc</td><td class=\"multihilo\">\$pspro</td><td class=\"interfaces\">\$ddi</td></tr>\",
                    \"<tr><th scope=\"row\">9:15 - 10:15</td><td class=\"empresa\">\$eie</td><td class=\"hlc\">\$hlc</td><td class=\"empresa\">\$eie</td><td class=\"empresa\">\$eie</td><td class=\"interfaces\">\$ddi</td></tr>\",
                    \"<tr><th scope=\"row\">10:15 - 11:15</td><td class=\"hlc\">\$hlc</td><td class=\"android\">\$pmdmo</td><td class=\"datos\">\$aad</td><td class=\"interfaces\">\$ddi</td><td class=\"sge\">\$sge</td></tr>\",
                    '<tr><th scope=\"row\">11:15 - 11:45</td><td colspan=\"5\">RECREO</td></tr>',
                    \"<tr><th scope=\"row\">11:45 - 12:45</td><td class=\"datos\">\$aad</td><td class=\"android\">\$pmdmo</td><td class=\"multihilo\">\$pspro</td><td class=\"datos\">\$aad</td><td class=\"android\">\$pmdmo</td></tr>\",
                    \"<tr><th scope=\"row\">15:45 - 13:45</td><td class=\"datos\">\$aad</td><td class=\"interfaces\">\$ddi</td><td class=\"interfaces\">DEINT</td><td class=\"datos\">\$aad</td><td class=\"android\">\$pmdmo</td></tr>\",
                    \"<tr><th scope=\"row\">13:45 - 14:45</td><td class=\"sge\">\$sge</td><td class=\"sge\">\$sge</td><td class=\"interfaces\">\$ddi</td><td class=\"sge\">\$sge</td><td class=\"multihilo\">\$pspro</td></tr></tody>\",
                    '</div scope=\"row\"></table>';
                    ?>");

                ?>
            </p>
        </article>
    </section>
</main>
<footer>
    <a href="./index.php">volver</a>
    <p>© Iván López Bermúdez</p>
</footer>
</body>

</html>
