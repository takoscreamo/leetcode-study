<?php

function removeElement(&$nums, $val) {
    $pos = 0;
    for ($i = 0; $i < count($nums); $i++) {
        if ($nums[$i] !== $val) {
            $nums[$pos] = $nums[$i];
            $pos++;
        }
    }
    return $pos; // k
}

// テスト
// docker compose exec web php 27_remove-element.php
$nums = [3, 2, 2, 3];
$val = 3;
$result = removeElement($nums, $val);
echo $result . "\n";
echo json_encode($nums) . "\n";

$nums = [0, 1, 2, 2, 3, 0, 4, 2];
$val = 2;
$result = removeElement($nums, $val);
echo $result . "\n";
echo json_encode($nums) . "\n";
