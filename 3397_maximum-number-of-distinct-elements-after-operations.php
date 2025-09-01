<?php

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maxDistinct($nums, $k) {
    $intervals = [];

    // 1. 各要素の区間 [L, R] を作成
    foreach ($nums as $num) {
        $intervals[] = [$num - $k, $num + $k];
    }

    // 2. 右端 R が小さい順にソート
    usort($intervals, function($a, $b) {
        return $a[1] <=> $b[1];
    });

    $distinct = 0;             // 異なる要素の数をカウント
    $nextFree = -PHP_INT_MAX;  // 次に使える最小の整数を初期化

    // 3. 区間ごとに処理
    foreach ($intervals as [$L, $R]) {
        // 例: 次に使える数が範囲の左端より小さい場合
        // nextFree = -PHP_INT_MAX, 区間 = [0,2] → nextFree < L
        // → nextFree を L にジャンプして割り当て可能な最小値にする
        if ($nextFree < $L) {
            $nextFree = $L;
        }

        // 範囲内でまだ使われていない数があれば割り当て
        // 例: nextFree = 0, 区間 = [0,2] → 0 <= 2 OK
        // 割り当て: 0 を選び、distinct++、次は nextFree = 1
        if ($nextFree <= $R) {
            $distinct++;    // 異なる要素を1つ追加
            $nextFree++;    // 次に使える数を更新
        }
        // もし nextFree > R の場合は割り当てできないのでスキップ
    }

    return $distinct;
}

// テスト
// docker compose exec web php 3397_maximum-number-of-distinct-elements-after-operations.php
// 1. 基本ケース
$nums = [1, 2, 4];
$k = 1;
echo maxDistinct($nums, $k) . "\n"; // 期待値: 3

// 2. 全て同じ値
$nums = [1, 1, 1];
$k = 2;
echo maxDistinct($nums, $k) . "\n"; // 期待値: 3

// 3. k = 0（操作不可）
$nums = [1, 2, 2, 3];
$k = 0;
echo maxDistinct($nums, $k) . "\n"; // 期待値: 3

// 4. 要素が離れている場合
$nums = [1, 10, 20];
$k = 2;
echo maxDistinct($nums, $k) . "\n"; // 期待値: 3

// 5. k が大きく、すべてまとめられる場合
$nums = [1, 5, 10];
$k = 100;
echo maxDistinct($nums, $k) . "\n"; // 期待値: 3

// 6. 1つの要素のみ
$nums = [42];
$k = 5;
echo maxDistinct($nums, $k) . "\n"; // 期待値: 1

// 7. 負の値を含む場合
$nums = [-5, 0, 5];
$k = 3;
echo maxDistinct($nums, $k) . "\n"; // 期待値: 3
