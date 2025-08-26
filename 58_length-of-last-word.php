<?php

function lengthOfLastWord($s) {
    // 前後の空白を削除
    $s = trim($s);

    // 空白で分割して最後の単語を取得
    $words = explode(' ', $s);
    $lastWord = end($words);

    // 長さを返す
    return strlen($lastWord);
}

// テスト
// docker compose exec web php 58_length-of-last-word.php
$s = "Hello World";
$result = lengthOfLastWord($s);
echo $result . "\n"; // 5

$s = "   fly me   to   the moon  ";
$result = lengthOfLastWord($s);
echo $result . "\n"; // 4

