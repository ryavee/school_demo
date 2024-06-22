<?php
require 'db.php';  // Database connection file

$id = $_GET['id'];
$query = "SELECT student.*, classes.name AS class_name 
          FROM student 
          JOIN classes ON student.class_id = classes.class_id 
          WHERE student.id = $id";
$result = mysqli_query($conn, $query);
$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>View Student</h1>
    <p><strong>Name:</strong> <?php echo $student['name']; ?></p>
    <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
    <p><strong>Address:</strong> <?php echo $student['address']; ?></p>
    <p><strong>Class:</strong> <?php echo $student['class_name']; ?></p>
    <p><strong>Created At:</strong> <?php echo $student['created_at']; ?></p>
    <p><img src="uploads/<?php echo $student['image']; ?>" width="200"></p>
    <a href="index.php" class="btn btn-primary">Back</a>
</div>
</body>
</html>
