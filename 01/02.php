<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$elves = explode(PHP_EOL . PHP_EOL, $text);
$elvesCalorieSums = [];
foreach($elves as $elf) {
    $elfCalories = explode(PHP_EOL, $elf);
    $elvesCalorieSums[] = array_sum($elfCalories);

}

rsort($elvesCalorieSums);

// 209691
echo array_sum([$elvesCalorieSums[0], $elvesCalorieSums[1], $elvesCalorieSums[2]]);