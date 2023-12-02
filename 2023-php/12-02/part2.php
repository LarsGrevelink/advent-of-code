<?php

$input = file_get_contents(__DIR__ . '/input.txt');
$lines = explode(PHP_EOL, $input);

$powers = [];

foreach ($lines as $line) {
    $maxCubes = ['red' => 0, 'green' => 0, 'blue' => 0];

    preg_match_all('/([0-9]+) (red|green|blue)/', $line, $cubes, PREG_SET_ORDER);

    foreach ($cubes as $set) {
        $maxCubes[$set[2]] = max($maxCubes[$set[2]], intval($set[1]));
    }

    $powers[] = array_product($maxCubes);
}

echo array_sum($powers);
