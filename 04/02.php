<?php

$text        = file_get_contents(__DIR__ . '/input.txt');
$assignments = explode(PHP_EOL, $text);
$total       = 0;

foreach ($assignments as $assignment) {
    $elfIds = explode(',', str_replace('-', ',', $assignment));
    if (
        ($elfIds[2] >= $elfIds[0] && $elfIds[2] <= $elfIds[1]) ||
        ($elfIds[3] >= $elfIds[0] && $elfIds[3] <= $elfIds[1]) ||
        ($elfIds[0] >= $elfIds[2] && $elfIds[0] <= $elfIds[3]) ||
        ($elfIds[1] >= $elfIds[2] && $elfIds[1] <= $elfIds[3])
    ) {
        $total++;
    }
}

// 872
echo $total . "\n";