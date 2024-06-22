<?php
require 'db.php';  // Database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $class_id = $_POST['class_id'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    
    // Validate image
    $allowed_types = ['image/jpeg', 'image/png'];
    $image_type = mime_content_type($_FILES['image']['tmp_name']);
    if (!in_array($image_type, $allowed_types)) {
        die("Invalid image type. Only JPG and PNG are allowed.");
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $query = "INSERT INTO student (name, email, address, class_id, image) 
                  VALUES ('$name', '$email', '$address', '$class_id', '$image')";
        mysqli_query($conn, $query);
        header('Location: index.php');
        exit(); // Ensure script stops executing after redirect
    } else {
        echo "Failed to upload image.";
    }
}

$classes = mysqli_query($conn, "SELECT * FROM classes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Create Student</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class_id" class="form-control">
                <?php while ($class = mysqli_fetch_assoc($classes)) { ?>
                    <option value="<?php echo $class['class_id']; ?>"><?php echo $class['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
