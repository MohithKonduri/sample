<?php
// Replace with your DB credentials
$host = "localhost";
$username = "root";
$password = "admin";
$database = "portfolio";

// Create DB connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get values from form
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert query
$sql = "INSERT INTO contacts (email, phone) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $phone);

if ($stmt->execute()) {
  echo "Thank you! Your info has been saved.";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
