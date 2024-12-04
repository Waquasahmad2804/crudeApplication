<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.css" rel="stylesheet">

    <style>
        /* Custom styles for search page */
body {
    background-color: #f4f6f9;
    font-family: Arial, sans-serif;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}

form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    margin-bottom: 20px;
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

.table {
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    width: 100%;
    max-width: 800px;
    margin-bottom: 20px;
}

.table thead {
    background-color: #007bff;
    color: white;
}

.table thead th {
    font-weight: bold;
    padding: 12px;
    text-align: center;
}

.table tbody tr {
    transition: background-color 0.3s ease;
}

.table tbody tr:hover {
    background-color: #f1f5f9;
}

.table td {
    vertical-align: middle;
    text-align: center;
    padding: 10px;
}

a {
    color: #007bff;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
    display: inline-block;
    margin-top: 15px;
}

a:hover {
    color: white;
    background-color: #007bff;
}

/* Error message styling */
.error-message {
    color: #dc3545;
    text-align: center;
    margin-top: 20px;
    font-weight: bold;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    form, .table {
        width: 95%;
        margin: 0 auto 20px;
        padding: 15px;
    }

    .table {
        font-size: 14px;
    }
}
    </style>
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