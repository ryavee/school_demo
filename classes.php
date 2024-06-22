<?php
require 'db.php';  // Database connection file

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $name = trim($_POST['name']);
        if (!empty($name)) {
            $query = "INSERT INTO classes (name) VALUES ('$name')";
            if (!mysqli_query($conn, $query)) {
                die("Error: " . mysqli_error($conn));
            }
        } else {
            $error = "Class name cannot be empty.";
        }
    } elseif (isset($_POST['save_edit'])) {
        $class_id = $_POST['class_id'];
        $name = trim($_POST['name']);
        if (!empty($name)) {
            $query = "UPDATE classes SET name='$name' WHERE class_id=$class_id";
            if (!mysqli_query($conn, $query)) {
                die("Error: " . mysqli_error($conn));
            }
        } else {
            $error = "Class name cannot be empty.";
        }
    } elseif (isset($_POST['delete'])) {
        $class_id = $_POST['class_id'];
        $query = "DELETE FROM classes WHERE class_id=$class_id";
        if (!mysqli_query($conn, $query)) {
            die("Error: " . mysqli_error($conn));
        }
    }
}

// Fetch all classes
$classes = mysqli_query($conn, "SELECT * FROM classes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Classes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">School Demo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="classes.php">Manage Classes</a>
                </li>
            </ul>
            <a href="create.php" class="btn btn-primary">Add Student</a>
        </div>
    </nav>

    <h1 class="mt-4">Manage Classes</h1>
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <form method="POST" class="form-inline mb-4">
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control mx-2">
        </div>
        <button type="submit" name="add" class="btn btn-primary mb-2">Add Class</button>
    </form>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Class ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($class = mysqli_fetch_assoc($classes)) { ?>
            <tr>
                <td><?php echo $class['class_id']; ?></td>
                <td><?php echo htmlspecialchars($class['name']); ?></td>
                <td>
                    <form method="POST" class="form-inline d-inline-block">
                        <input type="hidden" name="class_id" value="<?php echo $class['class_id']; ?>">
                        <button type="button" class="btn btn-warning mx-1" data-toggle="modal" data-target="#editClassModal" data-class-id="<?php echo $class['class_id']; ?>" data-class-name="<?php echo htmlspecialchars($class['name']); ?>">Edit</button>
                        <button type="submit" name="delete" class="btn btn-danger mx-1">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Edit Class Modal -->
<div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="editClassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClassModalLabel">Edit Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="class_id" id="edit-class-id">
                    <div class="form-group">
                        <label for="edit-class-name">Name</label>
                        <input type="text" name="name" id="edit-class-name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_edit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#editClassModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var classId = button.data('class-id'); // Extract info from data-* attributes
        var className = button.data('class-name');

        var modal = $(this);
        modal.find('#edit-class-id').val(classId);
        modal.find('#edit-class-name').val(className);
    });
});
</script>

</body>
</html>
