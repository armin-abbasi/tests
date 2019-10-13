<?php

// Complete the isValid function below.
function isValid($s) {
    $charRepeat = [];
    $diff = false;

    for ($i = 0; $i < strlen($s); $i++) {
        $charRepeat[ord($s[$i]) - ord('a')]++;
    }

    $allowedRep = $charRepeat[0];

    for ($i = 0; $i < count($charRepeat); $i++) {
        if ($charRepeat[$i] != $allowedRep && $diff) {
            return 'NO';
        }

        if ($charRepeat[$i] != $allowedRep) {
            $diff = true;
        }
    }

    return 'YES';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = '';
fscanf($stdin, "%[^\n]", $s);

$result = isValid($s);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
