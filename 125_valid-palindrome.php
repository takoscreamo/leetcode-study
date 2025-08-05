<?php
// 125. Valid Palindrome
// https://leetcode.com/problems/valid-palindrome/

// アルファベットと数字のみを考慮し、大文字小文字を区別しないパリンドロームを判定する関数
// 入力: s (文字列)
// 出力: bool (パリンドロームならtrue、そうでなければfalse)

function isPalindrome($s)
{
    $lower = strtolower($s);
    $filtered = preg_replace('/[^a-z0-9]/', '', $lower);
    return $filtered === strrev($filtered);
}

// テスト
// docker compose exec web php 125_valid-palindrome.php
var_dump(isPalindrome("A man, a plan, a canal: Panama")); // true
var_dump(isPalindrome("race a car")); // false
var_dump(isPalindrome("ab_a")); // true
