<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$sacks = explode(PHP_EOL, $text);
$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$total = 0;

foreach ($sacks as $sack) {
    $compartments = str_split($sack, strlen($sack) / 2);
    $commonLetter = implode(
        array_unique(
            array_intersect(
                str_split($compartments[0]),
                str_split($compartments[1])
            )
        )
    );
    $total += strpos($alphabet, $commonLetter) + 1;
}

// 7446
echo $total . "\n";