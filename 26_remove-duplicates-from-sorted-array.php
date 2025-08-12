<?php

function removeDuplicates(&$nums) {
    $n = count($nums);
    if ($n === 0) return 0;

    // 書き込み位置を示すポインタ（最初の要素は必ず残る）
    $writeIndex = 1;

    // 読み取り用ポインタで配列を走査
    for ($readIndex = 1; $readIndex < $n; $readIndex++) {
        // 直前の値と異なる場合のみ書き込み
        if ($nums[$readIndex] !== $nums[$readIndex - 1]) {
            $nums[$writeIndex] = $nums[$readIndex];
            $writeIndex++;
        }
    }

    // $writeIndex がユニークな要素数 k
    return $writeIndex;
}

// テスト
// docker compose exec web php 26_remove-duplicates-from-sorted-array.php
$nums = [1, 1, 2];
$result = removeDuplicates($nums);
echo $result . "\n";
echo json_encode($nums) . "\n";

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
$result = removeDuplicates($nums);
echo $result . "\n";
echo json_encode($nums) . "\n";
