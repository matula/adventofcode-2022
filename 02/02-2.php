<?php
$text = file_get_contents(__DIR__ . '/input.txt');
$rounds = explode(PHP_EOL, $text);
/**
 * opponent: A=rock,B=paper,C=scissor
 * me: X=lose,Y=draw,Z=win
 * game scores: lost=0, draw=3, win=6
 */

$map = [
    'X' => [
        'A' => 3,
        'B' => 1,
        'C' => 2
    ],
    'Y' => [
        'A' => 4,
        'B' => 5,
        'C' => 6
    ],
    'Z' => [
        'A' => 8,
        'B' => 9,
        'C' => 7
    ]
];

$totalScore = 0;
foreach ($rounds as $round) {
    $throws = explode(' ', $round);
    $totalScore += $map[$throws[1]][$throws[0]];
}

// 14184
echo $totalScore . "\n";