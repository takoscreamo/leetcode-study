<?php

function canConstruct($ransomNote, $magazine) {
    $ransomNoteCount = array_count_values(str_split($ransomNote));
    $magazineCount = array_count_values(str_split($magazine));

    foreach ($ransomNoteCount as $char => $count) {
        if (!isset($magazineCount[$char]) || $magazineCount[$char] < $count) {
            return false;
        }
    }
    return true;
}

// テスト
// docker compose exec web php 383_ransom-note.php
var_dump(canConstruct("a", "b")); // false
var_dump(canConstruct("aa", "ab")); // false
var_dump(canConstruct("aa", "aab")); // true
var_dump(canConstruct("abc", "cba")); // true
