<?php
$text  = file_get_contents(__DIR__ . '/input.txt');
$sacks = explode(PHP_EOL, $text);

$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$total = 0;
$totalSacks = count($sacks);

for ($i = 0; $i < $totalSacks; $i += 3) {
    $commonLetter = implode(
        array_unique(
            array_intersect(
                str_split($sacks[$i]),
                str_split($sacks[$i + 1]),
                str_split($sacks[$i + 2])
            )
        )
    );

    $total += strpos($alphabet, $commonLetter) + 1;
}

// 2646
echo $total . "\n";