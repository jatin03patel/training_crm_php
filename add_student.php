<?php
include 'config.php';
$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $degree = $_POST['degree'];
  $branch = $_POST['branch'];
  $status = $_POST['training_status'];

  if ($conn->query("INSERT INTO students (name, degree, branch, training_status) VALUES ('$name', '$degree', '$branch', '$status')")) {
  $msg = "<div class='alert alert-success'>Student added successfully!</div>";
  $msg .= "<a href='index.php' class='btn btn-secondary mt-2'>Back to List</a>";
} else {
  $msg = "<div class='alert alert-danger'>Error: {$conn->error}</div>";
}

}
?>
<!DOCTYPE html>
<html>
<head><title>Add Student</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container">
  <h2>Add Student</h2>
  <?= $msg ?>
  <form method="POST">
    <input class="form-control mb-2" name="name" placeholder="Name" required pattern="[A-Za-z ]{2,}" title="Only letters, min 2 chars">
    <input class="form-control mb-2" name="degree" placeholder="Degree" required>
    <input class="form-control mb-2" name="branch" placeholder="Branch" required>
    <input class="form-control mb-2" name="training_status" placeholder="Training Status" required>
    <button class="btn btn-success">Add</button>
  </form>
</body>
</html>
