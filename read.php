<?php
include('./config.php');
// $getStudents=$conn->prepare("SELECT * from students");
// $getStudents->execute();
// $students=$getStudents->fetchAll();
// echo  "<pre>";
// echo "<table border= '1px solid black'>";
// foreach($students as $student){ 
// echo "<tr><td>".($student['ID'])."</td>";
// echo "<td>".($student['NAME'])."</td>";
// echo "<td>".($student['ADDRESS'])."</td></tr>";

// }
// echo "</table>";

// $getTeacher=$conn->prepare("select * From teacher");
// $getTeacher->execute();
// $teacher=$getTeacher->fetchAll();

// print_r ($teacher);

$getDetail=$conn->prepare("select * from students");
$getDetail->execute();
$detail=$getDetail->fetchAll();
echo "<pre>";
print_r($detail);
?>