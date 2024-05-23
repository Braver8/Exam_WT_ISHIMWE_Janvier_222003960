<?php
session_start(); // Start session

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

// Function to display pop-up message and redirect
function display_message($message, $redirect_url) {
  echo "<script>alert('$message'); window.location.href = '$redirect_url';</script>";
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = sanitize_input($_POST["username"]);
  $email = sanitize_input($_POST["email"]);
  $password = password_hash(sanitize_input($_POST["password"]), PASSWORD_DEFAULT);

  // Validate inputs
  if (empty($username) || empty($email) || empty($_POST["password"])) {
    $error_message = "Username, email, and password are required.";
  } else {
    // Check if username or email already exists
    $sql_check_username = "SELECT * FROM users WHERE username=?";
    $stmt_check_username = $conn->prepare($sql_check_username);
    $stmt_check_username->bind_param("s", $username);
    $stmt_check_username->execute();
    $result_check_username = $stmt_check_username->get_result();

    $sql_check_email = "SELECT * FROM users WHERE email=?";
    $stmt_check_email = $conn->prepare($sql_check_email);
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $result_check_email = $stmt_check_email->get_result();

    if ($result_check_username->num_rows > 0) {
      $error_message = "Username already exists. Please choose a different one.";
    } elseif ($result_check_email->num_rows > 0) {
      $error_message = "Email already exists. Please choose a different one.";
    } else {
      // Insert new user into database
      $sql_insert_user = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
      $stmt_insert_user = $conn->prepare($sql_insert_user);
      $stmt_insert_user->bind_param("sss", $username, $email, $password);

      if ($stmt_insert_user->execute()) {
        // Registration successful
        display_message("User registered successfully. Back to login.", "login.html");
      } else {
        $error_message = "Registration failed. Please try again later.";
      }
      $stmt_insert_user->close();
    }
    $stmt_check_username->close();
    $stmt_check_email->close();
  }

  // Display error message if exists
  if (isset($error_message)) {
    display_message($error_message, "reg.html");
  }
}

// Close connection
$conn->close();
?>
