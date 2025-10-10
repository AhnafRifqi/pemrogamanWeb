<?php

$totalSeats = 45;
$occupiedSeats = 28;

$emptySeats = $totalSeats - $occupiedSeats;
$percentageEmpty = ($emptySeats / $totalSeats) * 100;

echo "Total seats: " . $totalSeats . "<br>";
echo "Occupied seats: " . $occupiedSeats . "<br>";
echo "Empty seats: " . $emptySeats . "<br>";
echo "Percentage of empty seats: " . round($percentageEmpty, 2) . "%";

?>