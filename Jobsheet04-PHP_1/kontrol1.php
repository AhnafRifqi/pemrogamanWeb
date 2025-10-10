<?php

$grades = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];


sort($grades);


array_shift($grades);
array_shift($grades);


array_pop($grades);
array_pop($grades);


$totalScore = array_sum($grades);


echo "Grades after removing the two highest and two lowest: ";
print_r($grades);
echo "<br>";
echo "Total score of the remaining grades: " . $totalScore;

?>