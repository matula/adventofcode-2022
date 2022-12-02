<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$rounds = explode(PHP_EOL, $text);
/**
 * opponent: A=rock,B=paper,C=scissor
 * me: X=rock,Y=paper,Z=scissor
 * game scores: lost=0, draw=3, win=6
 */
$myThrowScores = [
    'X' => 1,
    'Y' => 2,
    'Z' => 3
];

$opponentDrawMap = [
    'A' => 'X',
    'B' => 'Y',
    'C' => 'Z',
];

$opponentWinMap = [
    'A' => 'Z',
    'B' => 'X',
    'C' => 'Y'
];

$totalScore = 0;
foreach ($rounds as $round) {
    $throws = explode(' ', $round);
    $totalScore += $myThrowScores[$throws[1]];
    // draw
    if ($opponentDrawMap[$throws[0]] === $throws[1]) {
        $totalScore += 3;
        continue;
    }

    // loss
    if ($opponentWinMap[$throws[0]] === $throws[1]) {
        continue;
    }

    // win
    $totalScore += 6;
}

echo $totalScore . "\n";