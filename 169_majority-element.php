<?php

function majorityElement($nums) {
    $counts = [];
    $n = count($nums);
    
    foreach ($nums as $num) {
        $counts[$num] = ($counts[$num] ?? 0) + 1;
        if ($counts[$num] > $n / 2) {
            return $num;
        }
    }
}

// テスト
// docker compose exec web php 169_majority-element.php
$nums = [3, 2, 3];
$result = majorityElement($nums);
echo $result . "\n"; // 3

$nums = [2, 2, 1, 1, 1, 2, 2];
$result = majorityElement($nums);
echo $result . "\n"; // 2
