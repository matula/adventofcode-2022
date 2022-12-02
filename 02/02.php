<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$rounds = explode(PHP_EOL, $text);
/**
 * opponent: A=rock,B=paper,C=scissor
 * me: X=lose,Y=draw,Z=win
 * game scores: lost=0, draw=3, win=6
 */
$myThrowScores = [
    'A' => 1,
    'B' => 2,
    'C' => 3
];

$opponentLoseMap = [
    'A' => 'B',
    'B' => 'C',
    'C' => 'A',
];

$opponentWinMap = [
    'A' => 'C',
    'B' => 'A',
    'C' => 'B'
];

$totalScore = 0;
foreach ($rounds as $round) {
    $throws = explode(' ', $round);
    // draw
    if($throws[1] === 'Y') {
        $totalScore += ($myThrowScores[$round[0]] + 3);
        continue;
    }

    // lose
    if($throws[1] === 'X') {
        $totalScore += $myThrowScores[$opponentWinMap[$round[0]]];
        continue;
    }

    // win
    $totalScore += ($myThrowScores[$opponentLoseMap[$round[0]]] + 6);
}

echo $totalScore . "\n";