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

// Check if customer_id is set
if (isset($_REQUEST['customer_id'])) {
    $customer_id = $_REQUEST['customer_id'];

    // Prepare statement with parameterized query to prevent SQL injection (security improvement)
    $stmt = $connection->prepare("SELECT * FROM customers WHERE customer_id=?");
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $phone_number = $row['phone_number'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $country = $row['country'];
    } else {
        echo "Customer not found.";
        exit(); // Exit the script if customer is not found
    }
    $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
<!-- Update customer form -->
<h2><u>Update Customer Information</u></h2>
<form method="POST" onsubmit="return confirmUpdate();">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" value="<?= isset($first_name) ? htmlspecialchars($first_name) : '' ?>">
    <br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" value="<?= isset($last_name) ? htmlspecialchars($last_name) : '' ?>">
    <br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
    <br><br>

    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number" value="<?= isset($phone_number) ? htmlspecialchars($phone_number) : '' ?>">
    <br><br>

    <label for="address">Address:</label>
    <input type="text" name="address" value="<?= isset($address) ? htmlspecialchars($address) : '' ?>">
    <br><br>

    <label for="city">City:</label>
    <input type="text" name="city" value="<?= isset($city) ? htmlspecialchars($city) : '' ?>">
    <br><br>

    <label for="state">State:</label>
    <input type="text" name="state" value="<?= isset($state) ? htmlspecialchars($state) : '' ?>">
    <br><br>

    <label for="country">Country:</label>
    <input type="text" name="country" value="<?= isset($country) ? htmlspecialchars($country) : '' ?>">
    <br><br>

    <input type="submit" name="update" value="Update">
</form>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    // Retrieve updated values from form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    // Update the customer in the database (prepared statement again for security)
    $stmt = $connection->prepare("UPDATE customers SET first_name=?, last_name=?, email=?, phone_number=?, address=?, city=?, state=?, country=? WHERE customer_id=?");
    $stmt->bind_param("ssssssssi", $first_name, $last_name, $email, $phone_number, $address, $city, $state, $country, $customer_id);
    if ($stmt->execute()) {
        // Redirect to customerview.php or any appropriate page
        header('Location: customerview.php');
        exit(); // Ensure no other content is sent after redirection
    } else {
        echo "Error updating customer: " . $stmt->error;
    }

    $stmt->close(); // Close the statement after use
}

// Close the connection (important to close after use)
$connection->close();
?>
