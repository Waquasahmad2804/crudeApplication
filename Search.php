<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
    <form method="post" action="">
    <!-- <input class="mx-3 my-2" type="text " name="id" placeholder="ID">
    <br><br> -->
    <input class="mx-3 my-3"  type="text" name="name" placeholder="Enter Name">
    <br><br>
    <button class="btn btn-primary mx-3 my-3" type="submit" name="submit">Search User Detail</button></form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    include("./config.php");
    //$id=$_POST['id'];
    $name=$_POST['name'];
    //$studentDetails=$conn->prepare("select * from students where NAME='$name'");
    $studentDetails=$conn->prepare("select * from students where  NAME like '%$name%'");
    $studentDetails->execute();
    $getDetails=$studentDetails->fetchAll(PDO::FETCH_ASSOC);
    if($getDetails){
    echo "<table class='table table-bordered'>";
    echo "<tr><th>Name</th><th>ID</th><th>Address</th></tr>";
    foreach($getDetails as $getDetail){
   
    echo "<tr>";
    echo "<td>".$getDetail['NAME']."</td>";
    echo "<td>".$getDetail['ID']."</td>";
   echo    "<td>".$getDetail['ADDRESS']."</td>";
   echo  "<td><form action='' method='post'><button class='btn btn-primary' name='delete' value='".$getDetail['ID']."'>Delete</button></form></td>";
   echo "<td><a href='update.php?id=".$getDetail['ID']. "' > edit</a></td>";
    echo "</tr>";
  
    }
    echo "</table>";
    }
    else{
        echo "No record found for given details.";
        echo "<br>";
    }
}

echo "<a class='mx-3' href='delete.php'> Go back to Detail Page</a>";

?>