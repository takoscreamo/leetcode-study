<?php

/*
    @param String $s
    @param String $t
    @return Boolean
*/
function isAnagram($s, $t) {
    $s_arr = str_split($s);
    $t_arr = str_split($t);
    sort($s_arr);
    sort($t_arr);
    return $s_arr === $t_arr;
}

// テスト
// docker compose exec web php 242_valid-anagram.php
$s = "anagram";
$t = "nagaram";
$result = isAnagram($s, $t);
echo ($result ? "true" : "false") . "\n"; // true

$s = "rat";
$t = "car";
$result = isAnagram($s, $t);
echo ($result ? "true" : "false") . "\n"; // false

