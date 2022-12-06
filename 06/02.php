<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$characters = str_split($text);

$finalIndex = 0;
$characterArray = [];
foreach ($characters as $characterIndex => $character) {
    // go thru next 14 characters
    for ($i = 0; $i < 14; $i++) {
        // not valid, skip
        if (empty($characters[$characterIndex + $i])) {
            continue;
        }
        if (in_array($characters[$characterIndex + $i], $characterArray)) {
            // reset the array
            $characterArray = [];
            break;
        }
        $characterArray[] = $characters[$characterIndex + $i];
    }

    if (count($characterArray) == 14) {
        $finalIndex = $characterIndex + 14;
        break;
    }
}

// 2202
echo $finalIndex . "\n";
