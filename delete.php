<?php
include("./config.php");
$studentDetail=$conn->prepare("select * from students");
$studentDetail->execute();
$students=$studentDetail->fetchAll();


if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    $delete=$conn->prepare("delete  from students where ID= $id");
   
    $delete->execute();
    header("Location:".$_SERVER['PHP_SELF']);
exit;
}

echo "<table class='table table-bordered'>";
echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Actions</th></tr>";
foreach($students as $student){
    echo "<tr>";
    echo "<td>".$student['ID']."</td>";
    echo "<td>".$student['NAME']."</td>";
    echo "<td>".$student['ADDRESS']."</td>";
    echo  "<td><form action='' method='post'><button class='btn btn-primary' name='delete' value='".$student['ID']."'>Delete</button></form></td>";
    echo "<td><a href='update.php?id=".$student['ID']. "' > edit</a></td>";
    echo "</tr>";
}


echo "<a href='write.php'>Go to Insert Data</a>";
echo "<br>";
echo "<br>";
echo "<a href='Search.php'>Search User Detail</a>";
echo "<br>";
echo "<br>";
echo "</table>";




?>  