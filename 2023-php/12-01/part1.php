<?php

$input = file_get_contents(__DIR__ . '/input.txt');
$lines = explode(PHP_EOL, $input);

$calibrations = [];

foreach ($lines as $line) {
    $calibrationNumbers = preg_replace('/[A-z]/', '', $line);

    $calibrations[] = intval($calibrationNumbers[0] . $calibrationNumbers[mb_strlen($calibrationNumbers) - 1]);
}

echo array_sum($calibrations);
