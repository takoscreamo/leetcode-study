<?php

function isPalindrome($x)
{
    $str = strval($x);
    return $str === strrev($str);
}

// テスト
var_dump(isPalindrome(121)); // true
var_dump(isPalindrome(-121)); // false
var_dump(isPalindrome(10)); // false
