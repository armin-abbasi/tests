<?php

// Complete the hourglassSum function below.

function hourglassSum($arr) {
    $hourGlasses = [];

    for ($row = 1; $row < 5; $row++) {
        for ($i = 0; $i < 4; $i++) {
            if (
                isLegit($arr[$i][$row - 1]) &&
                isLegit($arr[$i + 1][$row - 1]) &&
                isLegit($arr[$i + 2][$row - 1]) &&
                isLegit($arr[$i + 1][$row]) &&
                isLegit($arr[$i][$row + 1]) &&
                isLegit($arr[$i + 1][$row + 1]) &&
                isLegit($arr[$i + 2][$row + 1])
            ) {
                $hourGlasses[] =
                    $arr[$i][$row - 1] +
                    $arr[$i + 1][$row - 1] +
                    $arr[$i + 2][$row - 1] +
                    $arr[$i + 1][$row] +
                    $arr[$i][$row + 1] +
                    $arr[$i + 1][$row + 1] +
                    $arr[$i + 2][$row + 1];
            }
        }
    }

    return biggestGlass($hourGlasses);
}

function isLegit($number)
{
    if ($number >= -9 && $number <= 9){
        return true;
    }

    return false;
}

function biggestGlass($hourGlasses)
{
    sort($hourGlasses);
    return $hourGlasses[count($hourGlasses) - 1];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$arr = array();

for ($i = 0; $i < 6; $i++) {
    fscanf($stdin, "%[^\n]", $arr_temp);
    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
