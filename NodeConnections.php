<?php

/**
 * @param array $gridOfNodes
 * @return int
 */
function numberOfConnections(array $gridOfNodes): int
{
    $nodes = 0;
    $start = count($gridOfNodes) - 1;
    $k = 1;

    while ($k < count($gridOfNodes) && $start > 0) {

        $currentRow = $gridOfNodes[$start];
        $upperRow = $gridOfNodes[$start - $k];

        if (countOnes($upperRow)) {
            $nodes += countOnes($currentRow) * countOnes($upperRow);
            $start--;
            $k = 1;
        } else {
            $k++;
        }
    }

    return $nodes;
}

/**
 * @param array $arr
 * @return int
 */
function countOnes(array $arr): int
{
    if (empty($arr)) {
        return false;
    }

    $count = 0;

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == 1) {
            $count++;
        }
    }
    return $count;
}


echo numberOfConnections([
    [1, 0, 1, 1],
    [0, 1, 1, 0],
    [0, 0, 0, 0],
    [1, 0, 0, 0],
]);