<?php include('./config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Students List</title>
    <style>
        body {
            background-color: #f4f6f9;
        }
        .container-custom {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .btn-custom {
            margin: 10px;
            padding: 12px 24px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="container container-custom mt-5">
        <h2 class="mb-4">Students List</h2>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getStudents = $conn->prepare("SELECT * from students");
                $getStudents->execute();
                $students = $getStudents->fetchAll();
                
                foreach($students as $student){
                    echo "<tr>";
                    echo "<td>".htmlspecialchars($student['ID'])."</td>";
                    echo "<td>".htmlspecialchars($student['NAME'])."</td>";
                    echo "<td>".htmlspecialchars($student['ADDRESS'])."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="write.php" class="btn btn-primary btn-custom">Enter New Details</a>
            <a href="Search.php" class="btn btn-secondary btn-custom">Search Student Details</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>