<?php

// Complete the hourglassSum function below.

function hourglassSum($arr) {
    $hourGlasses = [];

    for ($row = 1; $row < 5; $row++) {
        for ($i = 0; $i < 4; $i++) {
            if (
                isLegit($arr[$row - 1][$i]) &&
                isLegit($arr[$row - 1][$i + 1]) &&
                isLegit($arr[$row - 1][$i + 2]) &&
                isLegit($arr[$row][$i + 1]) &&
                isLegit($arr[$row + 1][$i]) &&
                isLegit($arr[$row + 1][$i + 1]) &&
                isLegit($arr[$row + 1][$i + 2])
            ) {
                $hourGlasses[] =
                    $arr[$row - 1][$i] +
                    $arr[$row - 1][$i + 1] +
                    $arr[$row - 1][$i + 2] +
                    $arr[$row][$i + 1] +
                    $arr[$row + 1][$i] +
                    $arr[$row + 1][$i + 1] +
                    $arr[$row + 1][$i + 2];
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
