<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$characters = str_split($text);

$finalIndex = 0;
$characterArray = [];
foreach ($characters as $characterIndex => $character) {
    if (in_array($character, $characterArray)) {
        $characterArray = [$character];
        continue;
    }

    $characterArray[] = $character;
    if (count($characterArray) == 4) {
        $finalIndex = ($characterIndex + 1);
        break;
    }
}

// 1876
echo $finalIndex . "\n";
