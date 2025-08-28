<?php

/*
    Boolean
    @param Integer $n
    @return Boolean
*/
function isHappy($n) {
    $seen = [];
    while ($n !== 1) {
        if (isset($seen[$n])) {
            return false;
        }
        $seen[$n] = true;

        $sum = 0;
        $arr = str_split((string)$n);
        foreach ($arr as $num) {
            $sum = $sum + $num * $num;
        }
        $n = $sum;
    }

    return true;
}

// テスト
// docker compose exec web php 202_happy-number.php
$n = 19;
$result = isHappy($n);
echo ($result ? "true" : "false") . "\n"; // true

$n = 2;
$result = isHappy($n);
echo ($result ? "true" : "false") . "\n"; // false

$n = 3;
$result = isHappy($n);
echo ($result ? "true" : "false") . "\n"; // false
