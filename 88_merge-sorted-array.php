<?php

function merge(&$nums1, $m, $nums2, $n) {
    $p1 = $m - 1;             // nums1 の有効部分の末尾インデックス
    $p2 = $n - 1;             // nums2 の末尾インデックス
    $p = $m + $n - 1;         // nums1 の末尾インデックス（結果格納場所）

    while ($p2 >= 0) {
        if ($p1 >= 0 && $nums1[$p1] > $nums2[$p2]) {
            $nums1[$p] = $nums1[$p1];
            $p1--;
        } else {
            $nums1[$p] = $nums2[$p2];
            $p2--;
        }
        $p--;
    }
}


// テスト
// docker compose exec web php 88_merge-sorted-array.php
$nums1 = [1, 2, 3, 0, 0, 0];
$m = 3;
$nums2 = [2, 5, 6];
$n = 3;
merge($nums1, $m, $nums2, $n);
var_dump($nums1); // [1, 2, 2, 3, 5, 6]

$nums1 = [1];
$m = 1;
$nums2 = [];
$n = 0;
merge($nums1, $m, $nums2, $n);
var_dump($nums1); // [1]

$nums1 = [0];
$m = 0;
$nums2 = [1];
$n = 1;
merge($nums1, $m, $nums2, $n);
var_dump($nums1); // [1]
