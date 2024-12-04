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
   <style>
      /* Custom styles for the edit form */
body {
    background-color: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
}

form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

input:read-only {
    background-color: #f9f9f9;
    cursor: not-allowed;
    color: #666;
}

input:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn-primary {
    width: 100%;
    padding: 10px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    form {
        padding: 20px;
        margin: 0 15px;
    }
}
      </style>
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