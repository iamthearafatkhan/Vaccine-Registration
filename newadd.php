<?php
session_start();
if (!isset($_SESSION['nid'])) {
    header("Location: login.php");
    exit;
}
include 'connection.php';

$category_message = "";
$center_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_category'])) {
        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
        $category_query = "INSERT INTO category_table (category_name) VALUES ('$category_name')";
        if (mysqli_query($conn, $category_query)) {
            $category_message = "Category added successfully!";
        } else {
            $category_message = "Error adding category: " . mysqli_error($conn); // Check for MySQL errors
        }
    } elseif (isset($_POST['add_center'])) {
        $center_name = mysqli_real_escape_string($conn, $_POST['center_name']);
        $center_query = "INSERT INTO center_table (center_name) VALUES ('$center_name')";
        if (mysqli_query($conn, $center_query)) {
            $center_message = "Center added successfully!";
        } else {
            $center_message = "Error adding center: " . mysqli_error($conn); // Check for MySQL errors
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category and Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="col-md-4">
    <a href="super.php" class="btn btn-secondary">Back</a>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Add Category</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category Name</label>
                    <input type="text" name="category_name" class="form-control" required>
                </div>
                <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
                <p class="text-success"><?php echo $category_message; ?></p>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Add Center</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="center_name" class="form-label">Center Name</label>
                    <input type="text" name="center_name" class="form-control" required>
                </div>
                <button type="submit" name="add_center" class="btn btn-primary">Add Center</button>
                <p class="text-success"><?php echo $center_message; ?></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
