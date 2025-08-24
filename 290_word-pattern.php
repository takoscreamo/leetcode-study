<?php

/**
 * @param String $pattern
 * @param String $s
 * @return Boolean
 */
function wordPattern($pattern, $s) {
    // 入力文字列をスペースで分割して単語配列を作成
    $words = explode(' ', $s);

    // 文字 → 単語 の対応関係を保持する連想配列
    $map = [];

    // 単語 → 文字 の対応関係を保持する連想配列（双方向チェック用）
    $map2 = [];

    // パターンの長さと単語数が異なる場合は一致しない
    if (strlen($pattern) !== count($words)) {
        return false;
    }

    // パターン文字と単語の対応を順にチェック
    for ($i = 0; $i < strlen($pattern); $i++) {
        // 文字 → 単語 の対応を確認
        if (array_key_exists($pattern[$i], $map)) {
            // すでに対応付けられた単語と異なる場合は false
            if ($map[$pattern[$i]] !== $words[$i]) {
                return false;
            }
        } else {
            // 未登録なら新しく対応を記録
            $map[$pattern[$i]] = $words[$i];
        }

        // 単語 → 文字 の対応を確認
        if (array_key_exists($words[$i], $map2)) {
            // すでに対応付けられた文字と異なる場合は false
            if ($map2[$words[$i]] !== $pattern[$i]) {
                return false;
            }
        } else {
            // 未登録なら新しく対応を記録
            $map2[$words[$i]] = $pattern[$i];
        }
    }
    
    // すべての対応が矛盾なく処理された場合 true
    return true;
}

// テスト
// docker compose exec web php 290_word-pattern.php
$pattern = "abba";
$s = "dog cat cat dog";
$result = wordPattern($pattern, $s);
echo ($result ? "true" : "false") . "\n"; // true

$pattern = "abba";
$s = "dog cat cat fish";
$result = wordPattern($pattern, $s);
echo ($result ? "true" : "false") . "\n"; // false

$pattern = "aaaa";
$s = "dog cat cat dog";
$result = wordPattern($pattern, $s);
echo ($result ? "true" : "false") . "\n"; // false

$pattern = "aaa";
$s = "aa aa aa aa";
$result = wordPattern($pattern, $s);
echo ($result ? "true" : "false") . "\n"; // false
