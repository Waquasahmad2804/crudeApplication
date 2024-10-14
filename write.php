<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="bootstrap.css">
<body>
    <form action="" method="post">

    <input class="my-3 mx-3" type="number" placeholder="ID" name="ID" required>
    <BR><br>
    <input class="my-3 mx-3" type="Text" placeholder="Name" name="name" required>
    <BR><br>
    <input class="my-3 mx-3" type="Text" placeholder="Address" name="address" required>
    <BR><br>
    <button class="btn btn-primary my-3 mx-3" type="Submit" name="submit">Add your detail</button>
    </form>
    <a class="mx-3" href="./delete.php">Go To edit page</a>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $id=$_POST['ID'];
    $address=$_POST['address'];
include("./config.php");
$student=$conn->prepare("insert into `students` values ('$id','$name','$address')");
 $result=$student->execute();
if($result){
   echo "data inserted";

}
else{
    echo "execution failed";
 }
}

?>