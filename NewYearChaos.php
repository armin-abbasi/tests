<?php

// Complete the minimumBribes function below.
function minimumBribes($q) {
    $count = 0;
    for ($i = count($q) - 1; $i >= 0; --$i) {
        $expected = $i + 1;
        if ($q[$i] != $expected) {
            if ($i >= 1 && $expected == $q[$i - 1]) {
                ++$count;
                $swap = $q[$i];
                $q[$i] = $q[$i - 1];
                $q[$i - 1] = $swap;
            } else if ($i >= 2 && $expected == $q[$i - 2]) {
                $count += 2;
                $q[$i - 2] = $q[$i - 1];
                $q[$i - 1] = $q[$i];
                $q[$i] = $i;
            } else {
                echo "Too chaotic\n";
                return;
            }
        }
    }

    echo $count . "\n";
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $q_temp);

    $q = array_map('intval', preg_split('/ /', $q_temp, -1, PREG_SPLIT_NO_EMPTY));

    minimumBribes($q);
}

fclose($stdin);
