<?php

$points = 650;
$reward_threshold = 500;

echo "Player's total score is: " . $points . "<br>";

if ($points > $reward_threshold) {
    echo "Do players get additional rewards? Yes";
} else {
    echo "Do players get additional rewards? No";
}

?>