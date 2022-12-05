<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$lines = explode(PHP_EOL, $text);

$stacks = array_slice($lines, 0, 8);
$stacks = array_reverse($stacks);
$movements = array_slice($lines, 10);
$levels = [];

// Create stacks - "horizontally"
foreach ($stacks as $stack) {
    $levelSplit = str_split($stack);

    // matrix of each level with their stacks
    $levels[0][] = !empty($levelSplit[1]) ? trim($levelSplit[1]) : '';
    $levels[1][] = !empty($levelSplit[5]) ? trim($levelSplit[5]) : '';
    $levels[2][] = !empty($levelSplit[9]) ? trim($levelSplit[9]) : '';
    $levels[3][] = !empty($levelSplit[13]) ? trim($levelSplit[13]) : '';
    $levels[4][] = !empty($levelSplit[17]) ? trim($levelSplit[17]) : '';
    $levels[5][] = !empty($levelSplit[21]) ? trim($levelSplit[21]) : '';
    $levels[6][] = !empty($levelSplit[25]) ? trim($levelSplit[25]) : '';
    $levels[7][] = !empty($levelSplit[29]) ? trim($levelSplit[29]) : '';
    $levels[8][] = !empty($levelSplit[33]) ? trim($levelSplit[33]) : '';
}

// Filter each level
foreach ($levels as $levelKey => $levelValue) {
    $levels[$levelKey] = array_filter($levelValue);
}

foreach ($movements as $movement) {
    // $matches[0] = total to move, $matches[1] = from, $matches[2] = to
    $matches = []; // reset the matches array
    preg_match_all('!\d+!', $movement, $matches);

    // loop through total to move
    for ($i = 0; $i < $matches[0][0]; $i++) {
        // pop off one and add to end of another
        $levels[$matches[0][2] - 1][] = array_pop($levels[$matches[0][1] - 1]);
    }
}

$topStack = [];
// Grab the last/top of each stack
foreach ($levels as $level) {
    $topStack[] = array_pop($level);
}

// SHMSDGZVC
echo implode('', $topStack) . "\n";
