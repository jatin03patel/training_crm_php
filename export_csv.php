<?php
include 'config.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=students_report.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Name', 'Degree', 'Branch', 'Status', 'Created At'));
$result = $conn->query("SELECT * FROM students");
while ($row = $result->fetch_assoc()) {
  fputcsv($output, $row);
}
fclose($output);
?>
