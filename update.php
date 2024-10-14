<?php
include("./config.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $getStudent=$conn->prepare("Select * from students where id=$id");
    $getStudent->execute();
    $Student=$getStudent->fetchAll();
 $name=$Student[0]['NAME'];
  $id=$Student[0]['ID'];
 $address=$Student[0]['ADDRESS'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<form method="post">
<input type="text" value="<?php echo $id ?>" name="id" readonly>
<br><br>
<input type="text" value="<?php echo $name ?>" name="name">
<br><br>

<input type="text" value="<?php echo $address ?>" name="address">
<br><br>
<button class="btn btn-primary btn-sm" type="submit" name="update">Edit Your Detail</button>
</form> 

</body>
</html>



<?php
if(isset($_POST['update'])){
$name=$_POST['name'];
$id=$_POST['id'];
$address=$_POST['address'];
$updateStudent = $conn->prepare("UPDATE students SET ADDRESS = '$address', NAME = '$name' WHERE ID = '$id'");
 if($updateStudent->execute()){
    header("location: delete.php");
    exit;
 }
 else{
 echo "updation failed";
 }
}
?>