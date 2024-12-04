

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Custom styles for student details page */
body {
    background-color: #f4f6f9;
    font-family: Arial, sans-serif;
    padding: 20px;
}

.table {
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
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

.btn-primary {
    margin: 0 auto;
    display: inline-block;
    padding: 6px 12px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

a {
    color: #007bff;
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 4px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

a:hover {
    color: white;
    background-color: #007bff;
}

/* Navigation links */
.navigation-links {
    margin-top: 20px;
    display: flex;
    gap: 15px;
    justify-content: center;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table {
        font-size: 14px;
    }
    
    .btn-primary {
        padding: 4px 8px;
        font-size: 12px;
    }
}
        </style>
</head>
<body>
    
</body>
</html>
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
echo "<a href='index.php'>Back To Student Detail</a>";
echo "<br>";
echo "<br>";
echo "</table>";




?>  