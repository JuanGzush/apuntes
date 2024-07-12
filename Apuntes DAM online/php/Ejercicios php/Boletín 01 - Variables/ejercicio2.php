<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 02</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercise2.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <span>boletín variables</span>
        <span>ejercicio 02</span>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                $address = 'Avenida Bruselas Edificio Bruselas';
                $aad = 'Acceso a datos';
                $ddi = 'Desarrollo de interfaces';
                $eie = 'Empresa e iniciativa emprendedora';
                $hlc = 'Horas de libre configuración';
                $pspro = 'Programación de servicios y procesos';
                $pmdmo = 'Programación multimedia y dispositivos móviles';
                $sge = 'Sistemas de gestión empresarial';

                echo '<span>Nombre del alumno: Iván López Bermúdez</span><br>',
                '<span>Ciclo formativo que realiza el alumno: Desarrollo de aplicaciones multiplataforma</span><br>',
                '<span>Curso del alumno: 2º<br>',
                "<span>Dirección del alumno: $address<br>",
                '<span><br>Asignaturas que cursa el alumno:</span>',
                '<ul>',
                "<li>$aad</li>",
                "<li>$ddi</li>",
                "<li>$eie</li>",
                "<li>$hlc</li>",
                "<li>$pspro</li>",
                "<li>$pmdmo</li>",
                "<li>$sge</li>",
                '</ul>'

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
                        echo '<span>Nombre del alumno: Iván López Bermúdez</span><br>',
                        '<span>Ciclo formativo que realiza el alumno: Desarrollo de aplicaciones multiplataforma</span><br>',
                        '<span>Curso del alumno: Segundo<br>',
                        \"<span>Dirección del alumno: \$address<br>\",
                        '<span><br>Asignaturas que cursa el alumno:</span>',
                        '<ul>',
                        \"<li>\$aad</li>\",
                        \"<li>\$ddi</li>\",
                        \"<li>\$eie</li>\",
                        \"<li>\$hlc</li>\",
                        \"<li>\$pspro</li>\",
                        \"<li>\$pmdmo</li>\",
                        \"<li>\$sge</li>\",
                        '</ul>'
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
