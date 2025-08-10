<?php

function isIsomorphic($s, $t) {
    if (strlen($s) !== strlen($t)) return false;

    $mapST = [];
    $mapTS = [];

    for ($i = 0; $i < strlen($s); $i++) {
        $c1 = $s[$i];
        $c2 = $t[$i];

        // s → t のマッピングを確認
        if (isset($mapST[$c1])) {
            if ($mapST[$c1] !== $c2) return false;
        } else {
            $mapST[$c1] = $c2;
        }

        // t → s のマッピングを確認
        if (isset($mapTS[$c2])) {
            if ($mapTS[$c2] !== $c1) return false;
        } else {
            $mapTS[$c2] = $c1;
        }
    }

    return true;
}

// テスト
// docker compose exec web php 205_isomorphic-strings.php
var_dump(isIsomorphic("egg", "add")); // true
var_dump(isIsomorphic("foo", "bar")); // false
var_dump(isIsomorphic("paper", "title")); // true
