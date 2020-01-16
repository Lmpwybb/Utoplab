<?php

$start = microtime(true);
$line_number = 1;

echo '<body style="background-color:black">';
echo '<span style="color:white">';

while ($line_number <= 3000)
{

    echo $line_number . ' . Les poneys, c\'est le kiff. <br /> ' . "\n";
    $line_number++;

}

$end = microtime(true);
$ping = $end - $start;

echo ' <br /> Le temps d\'exécution de la page est de ' . $ping . ' millisecondes.';
