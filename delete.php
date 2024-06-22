<?php
require 'db.php';  // Database connection file

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the image file path
    $result = mysqli_query($conn, "SELECT image FROM student WHERE id = $id");
    $student = mysqli_fetch_assoc($result);
    $image = $student['image'];
    
    // Delete the student record
    $query = "DELETE FROM student WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        // Delete the image file
        if (file_exists("uploads/$image")) {
            unlink("uploads/$image");
        }
        header('Location: index.php');
    } else {
        echo "Failed to delete student.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Delete Student</h1>
    <form method="POST">
        <p>Are you sure you want to delete this student?</p>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
