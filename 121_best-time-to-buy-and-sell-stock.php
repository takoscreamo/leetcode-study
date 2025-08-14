<?php

function maxProfit($prices) {
    $min_price = PHP_INT_MAX; // とても大きな値からスタート
    $max_profit = 0;

    foreach ($prices as $price) {
        if ($price < $min_price) {
            $min_price = $price; // 安値更新
        } elseif ($price - $min_price > $max_profit) {
            $max_profit = $price - $min_price; // 利益更新
        }
    }

    return $max_profit;
}

// テスト
// docker compose exec web php 121_best-time-to-buy-and-sell-stock.php
$prices = [7, 1, 5, 3, 6, 4];
$result = maxProfit($prices);
echo $result . "\n"; // 5

$prices = [7, 6, 4, 3, 1];
$result = maxProfit($prices);
echo $result . "\n"; // 0
