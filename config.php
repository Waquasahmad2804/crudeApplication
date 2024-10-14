<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>



<?php
$host="localhost";
$user="root";
$pass=null;
$dbname="college";

$conn=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
try{
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "connection successful with database";
}
catch(PDOException $err){
    echo "connection failed due to ".$err->getMessage();
}
?>