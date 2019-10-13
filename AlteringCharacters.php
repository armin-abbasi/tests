<?php

// Complete the alternatingCharacters function below.
function alternatingCharacters($s)
{
    $count = 0;

    for ($i = 1; $i < strlen($s); $i++) {
        if ($s[$i] == $s[$i - 1]) {
            $count++;
        }
    }

    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $q);

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);

    $result = alternatingCharacters($s);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
