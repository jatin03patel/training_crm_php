<?php
include 'config.php';

// Fetch student data
$result = $conn->query("SELECT * FROM students");
if (!$result) {
  die("<div class='alert alert-danger'>Query failed: " . $conn->error . "</div>");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Training CRM</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
  @media(max-width: 768px) {
    table, thead, tbody, th, td, tr { display: block; }
    tr { margin-bottom: 15px; }
    th { display: none; }
    td { position: relative; padding-left: 50%; }
    td::before {
      position: absolute;
      left: 6px; width: 45%; white-space: nowrap; font-weight: bold;
    }
    td:nth-of-type(1)::before { content: "ID"; }
    td:nth-of-type(2)::before { content: "Name"; }
    td:nth-of-type(3)::before { content: "Degree"; }
    td:nth-of-type(4)::before { content: "Branch"; }
    td:nth-of-type(5)::before { content: "Status"; }
    td:nth-of-type(6)::before { content: "Created"; }
    td:nth-of-type(7)::before { content: "Actions"; }
  }
  </style>
</head>
<body class="container">
  <h2>Student List</h2>
  <a href="add_student.php" class="btn btn-primary mb-2">Add Student</a>
  <a href="export_csv.php" class="btn btn-success mb-2">Download CSV</a>
  <input type="text" id="searchInput" class="form-control mb-2" placeholder="Search student...">

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Degree</th>
        <th>Branch</th>
        <th>Status</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['degree']) ?></td>
          <td><?= htmlspecialchars($row['branch']) ?></td>
          <td><?= htmlspecialchars($row['training_status']) ?></td>
          <td><?= htmlspecialchars($row['created_at']) ?></td>
          <td>
            <a href="delete_student.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <script>
  document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toUpperCase();
    let rows = document.querySelectorAll("table tbody tr");
    rows.forEach(row => {
      let text = row.innerText.toUpperCase();
      row.style.display = text.includes(filter) ? "" : "none";
    });
  });
  </script>
</body>
</html>
