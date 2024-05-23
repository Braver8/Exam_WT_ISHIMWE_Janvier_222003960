<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user inputs
function sanitize_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Handle admin registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = sanitize_input($_POST["username"]);
  $email = sanitize_input($_POST["email"]);
  $password = password_hash(sanitize_input($_POST["password"]), PASSWORD_DEFAULT);

  // Prepare and bind SQL statement
  $stmt_insert_admin = $conn->prepare("INSERT INTO admins (username, email, password) VALUES (?, ?, ?)");
  $stmt_insert_admin->bind_param("sss", $username, $email, $password);

  // Execute SQL statement
  if ($stmt_insert_admin->execute()) {
    echo "<script>alert('admin registered successfully. Back to login.'); window.location.href = 'admin.html';</script>";
  } else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
  }

  // Close prepared statement
  $stmt_insert_admin->close();
}

// Close database connection
$conn->close();
?>
