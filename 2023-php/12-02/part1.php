<?php

$input = file_get_contents(__DIR__ . '/input.txt');
$lines = explode(PHP_EOL, $input);

$maxCubes = ['red' => 12, 'green' => 13, 'blue' => 14];

$validGames = [];

foreach ($lines as $line) {
    preg_match('/Game ([0-9]+)/', $line, $gameNumber);
    preg_match_all('/([0-9]+) (red|green|blue)/', $line, $cubes, PREG_SET_ORDER);

    foreach ($cubes as $set) {
        if (intval($set[1]) > $maxCubes[$set[2]]) {
            continue 2;
        }
    }

    $validGames[] = intval($gameNumber[1]);
}

echo array_sum($validGames);
