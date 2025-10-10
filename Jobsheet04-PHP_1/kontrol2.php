<?php

$price = 120000;
$discount_threshold = 100000;
$discount_percentage = 0.20;

if ($price > $discount_threshold) {
    $discount_amount = $price * $discount_percentage;
    $final_price = $price - $discount_amount;
    echo "The product price is Rp " . number_format($price, 0, ',', '.') . ".<br>";
    echo "This purchase is eligible for a 20% discount.<br>";
    echo "Discount amount: Rp " . number_format($discount_amount, 0, ',', '.') . ".<br>";
    echo "Total price to be paid after discount: Rp " . number_format($final_price, 0, ',', '.') . ".";
} else {
    echo "The product price is Rp " . number_format($price, 0, ',', '.') . ".<br>";
    echo "This purchase is not eligible for a discount. Total price to be paid is Rp " . number_format($price, 0, ',', '.') . ".";
}

?>