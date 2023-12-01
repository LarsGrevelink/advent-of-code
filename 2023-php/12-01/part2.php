<?php

$input = file_get_contents(__DIR__ . '/input.txt');
$lines = explode(PHP_EOL, $input);

$possibilities = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

$calibrations = [];

foreach ($lines as $line) {
    $matches = [];

    for ($i = 0; $i < mb_strlen($line); $i++) {
        foreach ($possibilities as $index => $possibility) {
            if (substr($line, $i, strlen($possibility)) === $possibility) {
                $matches[] = $index % 10;
            }
        }
    }

    $calibrations[] = intval($matches[0] . $matches[count($matches) - 1]);
}

echo array_sum($calibrations);
