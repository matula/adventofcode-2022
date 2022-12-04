<?php

$text        = file_get_contents(__DIR__ . '/input.txt');
$assignments = explode(PHP_EOL, $text);
$total       = 0;

// This is about 3x slower than the comparisons in 02.php
foreach ($assignments as $assignment) {
    $elfIds    = explode(',', str_replace('-', ',', $assignment));
    $elf1Range = range($elfIds[0], $elfIds[1]);
    $elf2Range = range($elfIds[2], $elfIds[3]);
    if (!empty(array_intersect($elf1Range, $elf2Range))) {
        $total++;
    }
}

// 872
echo $total . "\n";