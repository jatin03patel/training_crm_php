<?php
$conn = new mysqli("localhost", "root", "", "training_crm_php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
