<?php

/*
 * Complete the bonetrousle function below.
 */
function bonetrousle($n, $k, $b)
{
    $arBoxes = [];
    $partialSum = 0;
    for ($j = 1; $j <= $b; $j++) {
        $arBoxes[] = $j;
        $partialSum += $j;
    }
    if ($partialSum > $n) {
        return [-1];
    }

    $last = $b - 1;
    $found = true;
    while ($partialSum < $n) {
        if ($last < 0) {
            return [-1];
            $found = false;
            break;
        }
        $current = $arBoxes[$last];
        $dif = $n - $partialSum;
        if ($current + $dif > $k) {
            $arBoxes[$last] = $k;
            $partialSum += ($k - $current);
        } else {
            $arBoxes[$last] = $current + $dif;
            $partialSum += $dif;
        }
        $last--;
        $k--;
    }

    if ($found) {
        return $arBoxes;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%[^\n]", $nkb_temp);
    $nkb = explode(' ', $nkb_temp);

    $n = intval($nkb[0]);

    $k = intval($nkb[1]);

    $b = intval($nkb[2]);

    $result = bonetrousle($n, $k, $b);

    fwrite($fptr, implode(" ", $result) . "\n");
}

fclose($stdin);
fclose($fptr);
