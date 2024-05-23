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
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM customers WHERE customer_id=?");
    $stmt->bind_param("i", $customer_id);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Customer Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this customer?");
            }
        </script>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h2>Delete Customer</h2>
            <form method="post" onsubmit="return confirmDelete();">
                <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                <input type="submit" value="Delete" class="btn btn-danger">
                <a href="customerview.php" class="btn btn-secondary">Cancel</a>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success mt-3'>Record deleted successfully.</div>";
                    // Redirect back to customerview.php after deletion
                    header("Location: customerview.php");
                    exit(); // Ensure script stops execution after redirection
                } else {
                    echo "<div class='alert alert-danger mt-3'>Error deleting data: " . $stmt->error . "</div>";
                }
                $stmt->close();
            }
            ?>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Customer ID is not set.";
}

$connection->close();
?>
