<?php

/*
    @param Integer[] $nums
    @param Integer $target
    @return Integer[]
*/
function twoSum($nums, $target) {
    $n = count($nums);

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($nums[$i] + $nums[$j] === $target) {
                return [$i, $j];
            }
        }
    }
}

// テスト
// docker compose exec web php 1_two-sum.php
$nums = [2, 7, 11, 15];
$target = 9;
$result = twoSum($nums, $target);
echo implode(", ", $result) . "\n"; // [0, 1]

$nums = [3, 2, 4];
$target = 6;
$result = twoSum($nums, $target);
echo implode(", ", $result) . "\n"; // [1, 2]

$nums = [3, 3];
$target = 6;
$result = twoSum($nums, $target);
echo implode(", ", $result) . "\n"; // [0, 1]
