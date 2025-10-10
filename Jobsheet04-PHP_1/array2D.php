<?php


$studentGrades = [
    ['name' => 'Alice', 'grade' => 85],
    ['name' => 'Bob', 'grade' => 92],
    ['name' => 'Charlie', 'grade' => 78],
    ['name' => 'David', 'grade' => 64],
    ['name' => 'Eva', 'grade' => 90]
];
    

$totalScore = 0;
foreach ($studentGrades as $student) {
    $totalScore += $student['grade'];
}


$numberOfStudents = count($studentGrades);
$classAverage = $totalScore / $numberOfStudents;

echo "Class Average: " . number_format($classAverage, 2) . "<br><br>";


echo "Students who scored above the class average:<br>";
foreach ($studentGrades as $student) {
    if ($student['grade'] > $classAverage) {
        echo "Name: " . $student['name'] . ", Grade: " . $student['grade'] . "<br>";
    }
}

?>