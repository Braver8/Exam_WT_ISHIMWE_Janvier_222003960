<?php
session_start();

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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    $sql = "SELECT * FROM admins WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Check if password matches
            if (password_verify($password, $row['password'])) {
                // Authentication successful
                $_SESSION['admin'] = true;
                header("Location: dashboard.html");
                exit();
            } else {
                // Authentication failed
                $error_message = "Invalid username or password";
            }
        } else {
            // Authentication failed
            $error_message = "Invalid username or password";
        }
    } else {
        // Error in SQL query execution
        $error_message = "Error: " . $conn->error;
    }
    // Redirect back to login page with error message
    header("Location: admin.html?error=" . urlencode($error_message));
    exit();
}

?>
