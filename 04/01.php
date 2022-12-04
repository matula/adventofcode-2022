<?php

$text        = file_get_contents(__DIR__ . '/input.txt');
$assignments = explode(PHP_EOL, $text);
$total       = 0;
foreach ($assignments as $assignment) {
    $elfIds = explode(',', str_replace('-', ',', $assignment));
    // elf 2 is within elf 1 or elf 1 is within elf 2
    if (
        ($elfIds[2] >= $elfIds[0] && $elfIds[3] <= $elfIds[1]) ||
        ($elfIds[0] >= $elfIds[2] && $elfIds[1] <= $elfIds[3])
    ) {
        $total++;
    }
}
// 540
echo $total . "\n";