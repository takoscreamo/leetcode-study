<?php

// 自分の回答(時間超過)
function findAnagramsMyAnswer($s, $p) {
    $p_count = strlen($p);
    $s_count = strlen($s);
    $arr = [];

    $p_arr = str_split($p);
    sort($p_arr);

    for ($i = 0; $i < $s_count; $i++) {
        $str = substr($s, $i, $p_count);
        $s_arr = str_split($str);
        sort($s_arr);

        if ($s_arr === $p_arr) {
            $arr[] = $i;
        }
    }

    return $arr;
}


// 模範回答
/**
 * @param String $s
 * @param String $p
 * @return Integer[]
 */
function findAnagrams($s, $p) {
    $n = strlen($s);   // s の長さ
    $m = strlen($p);   // p の長さ

    // s が p より短ければ、アナグラムは絶対に作れない
    if ($n < $m) return [];

    $result = [];

    // 文字数を数えるための配列を用意（a〜z の26文字ぶん）
    // ord('a') = 97 なので、ord($c) - 97 で a=0, b=1, … z=25 に変換できる
    $pCount = array_fill(0, 26, 0);  // p の文字数カウント
    $sCount = array_fill(0, 26, 0);  // s の「現在の窓」の文字数カウント

    // --- 初期化: p のカウントと、s の最初の m 文字のカウントを取る ---
    for ($i = 0; $i < $m; $i++) {
        $pCount[ord($p[$i]) - 97]++;   // p の文字数を記録
        $sCount[ord($s[$i]) - 97]++;   // s の最初の m 文字を記録
    }

    // 最初の窓が p と同じなら、アナグラム発見！
    if ($pCount === $sCount) $result[] = 0;

    // --- 窓を右にスライドしながら確認していく ---
    for ($i = $m; $i < $n; $i++) {
        // 新しく右端に入ってきた文字をカウント
        $sCount[ord($s[$i]) - 97]++;

        // 左端から外れた文字をカウントから引く
        $sCount[ord($s[$i - $m]) - 97]--;

        // 現在の窓と p のカウントが一致していればアナグラム！
        if ($pCount === $sCount) {
            $result[] = $i - $m + 1;  // 窓の開始位置を記録
        }
    }

    // アナグラムの開始インデックス一覧を返す
    return $result;
}

// テスト
// docker compose exec web php 438_find-all-anagrams-in-a-string.php
$s = "cbaebabacd";
$p = "abc";
print_r(findAnagrams($s, $p)); // [0, 6]

$s = "abab";
$p = "ab";
print_r(findAnagrams($s, $p)); // [0, 1, 2]
