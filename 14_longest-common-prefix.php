<?php

/*
    String
    @param String[] $strs
    @return String
*/
function longestCommonPrefix($strs) {
    if (empty($strs)) {
        return "";
    }

    // 最初の文字列を基準とする
    $prefix = $strs[0];

    foreach ($strs as $str) {
        // $str の先頭が $prefix で始まらない限りループを回す
        while (strpos($str, $prefix) !== 0) {
            // $prefix を1文字短くして、共通部分を縮めていく
            $prefix = substr($prefix, 0, -1);

            // もし $prefix が空になったら、共通プレフィックスは存在しない
            if ($prefix === "") {
                return "";
            }
        }
    }

    // ループを最後まで抜けた時点で、$prefix が最長共通プレフィックス
    return $prefix;
}

// テスト
// docker compose exec web php 14_longest-common-prefix.php
$strs = ["flower", "flow", "flight"];
$result = longestCommonPrefix($strs);
echo $result . "\n"; // fl

$strs = ["dog", "racecar", "car"];
$result = longestCommonPrefix($strs);
echo $result . "\n"; // ""
