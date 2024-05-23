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
// Check if book_id is set
if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM books WHERE book_id=?");
    $stmt->bind_param("i", $book_id);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Book Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this book?");
            }
        </script>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h2>Delete Book</h2>
            <form method="post" onsubmit="return confirmDelete();">
                <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                <input type="submit" value="Delete" class="btn btn-danger">
                <a href="bookview.php" class="btn btn-secondary">Cancel</a>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success mt-3'>Record deleted successfully.</div>";
                    // Redirect back to bookview.php after deletion
                    header("Location: bookview.php");
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
    echo "Book ID is not set.";
}

$connection->close();
?>
