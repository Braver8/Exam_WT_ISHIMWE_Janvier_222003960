<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if user_id is set
if (isset($_REQUEST['user_id'])) {
    $user_id = $_REQUEST['user_id'];

    // Prepare statement with parameterized query to prevent SQL injection (security improvement)
    $stmt = $connection->prepare("SELECT * FROM users WHERE user_id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $email = $row['email'];
    } else {
        echo "User not found.";
        exit(); // Exit the script if user is not found
    }
    $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
<!-- Update user form -->
<h2><u>Update User Information</u></h2>
<form method="POST" onsubmit="return confirmUpdate();">
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>">
    <br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
    <br><br>

    <input type="submit" name="update" value="Update">
</form>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    // Retrieve updated values from form
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update the user in the database (prepared statement again for security)
    $stmt = $connection->prepare("UPDATE users SET username=?, email=? WHERE user_id=?");
    $stmt->bind_param("ssi", $username, $email, $user_id);
    if ($stmt->execute()) {
        // Redirect to userview.php or any appropriate page
        header('Location: userview.php');
        exit(); // Ensure no other content is sent after redirection
    } else {
        echo "Error updating user: " . $stmt->error;
    }

    $stmt->close(); // Close the statement after use
}

// Close the connection (important to close after use)
$connection->close();
?>
