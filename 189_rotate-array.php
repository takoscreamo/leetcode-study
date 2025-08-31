<?php

/*
    @param Integer[] $nums
    @param Integer $k
    @return Void
*/
function rotate(&$nums, $k) {
    // 配列の要素数を取得
    $n = count($nums);

    // k が配列の長さより大きい場合に調整
    // 例: 長さ7で k=10 → 10 % 7 = 3（3回回すのと同じ意味）。
    $k = $k % $n;

    // k が 0 の場合は回転不要
    if ($k === 0) return;

    // 配列を回転させる:
    // array_slice($nums, -$k) → 後ろから k 個を取得
    // array_slice($nums, 0, $n - $k) → 前の n-k 個を取得
    // それを結合すると「右に k ステップ回転」した配列になる
    $nums = array_merge(
        array_slice($nums, -$k),       // 例: [1,2,3,4,5,6,7], k=3 → [5,6,7]
        array_slice($nums, 0, $n - $k) // 例: [1,2,3,4,5,6,7], n-k=4 → [1,2,3,4]
    );
    // 結果: [5,6,7,1,2,3,4]
}

// テスト
// docker compose exec web php 189_rotate-array.php
$nums = [1, 2, 3, 4, 5, 6, 7];
$k = 3;
rotate($nums, $k);
echo implode(", ", $nums) . "\n"; // [5,6,7,1,2,3,4]

$nums = [-1, -100, 3, 99];
$k = 2;
rotate($nums, $k);
echo implode(", ", $nums) . "\n"; // [3,99,-1,-100]
