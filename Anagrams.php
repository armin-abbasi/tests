<?php

// Complete the makeAnagram function below.
function makeAnagram($str1, $str2)
{
    $del = 0;
    $diff = array_fill(0, 26, 0);

    for ($i = 0; $i < strlen($str1); $i++) {
        $diff[ord($str1[$i]) - ord('a')]++;
    }

    for ($i = 0; $i < strlen($str2); $i++) {
        $diff[ord($str2[$i]) - ord('a')]--;
    }

    for ($i = 0; $i < 26; $i++) {
        if (isset($diff[$i]))
            $del += abs($diff[$i]);
    }

    return $del;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$a = '';
fscanf($stdin, "%[^\n]", $a);

$b = '';
fscanf($stdin, "%[^\n]", $b);

$res = makeAnagram($a, $b);

fwrite($fptr, $res . "\n");

fclose($stdin);
fclose($fptr);
