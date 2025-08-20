<?php

function removeDuplicateLetters($s) {
    $lastIndex = [];
    $n = strlen($s);

    // 各文字の最後の出現位置を記録
    for ($i = 0; $i < $n; $i++) {
        $lastIndex[$s[$i]] = $i;
    }

    $stack = [];
    $inStack = [];

    for ($i = 0; $i < $n; $i++) {
        $ch = $s[$i];

        // すでにスタックに含まれていればスキップ
        if (!empty($inStack[$ch])) {
            continue;
        }

        // 辞書順の最小化のために、条件を満たす限りポップする
        while (!empty($stack) &&
            end($stack) > $ch &&
            $lastIndex[end($stack)] > $i) {
            $removed = array_pop($stack);
            $inStack[$removed] = false;
        }

        // スタックに追加
        $stack[] = $ch;
        $inStack[$ch] = true;
    }

    return implode("", $stack);
}

// テスト
// docker compose exec web php 316_remove-duplicate-letters.php
$s = "bcabc";
$result = removeDuplicateLetters($s);
echo $result . "\n"; // abc

$s = "cbacdcbc";
$result = removeDuplicateLetters($s);
echo $result . "\n"; // acdb
