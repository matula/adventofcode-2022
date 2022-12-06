<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$characters = str_split($text);

$finalIndex = 0;
$characterArray = [];
$minUniqueCharacters = 4;
foreach ($characters as $characterIndex => $character) {
    // go thru next $minUniqueCharacters characters
    for ($i = 0; $i < $minUniqueCharacters; $i++) {
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

    if (count($characterArray) == $minUniqueCharacters) {
        $finalIndex = $characterIndex + $minUniqueCharacters;
        break;
    }
}


// 1876
echo $finalIndex . "\n";
