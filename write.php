<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Custom styles for the form */
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

a {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}

a:hover {
    color: #0056b3;
    text-decoration: underline;
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