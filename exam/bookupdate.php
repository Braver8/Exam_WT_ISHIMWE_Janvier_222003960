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
if (isset($_REQUEST['book_id'])) {
    $book_id = $_REQUEST['book_id'];

    // Prepare statement with parameterized query to prevent SQL injection (security improvement)
    $stmt = $connection->prepare("SELECT * FROM books WHERE book_id=?");
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $author = $row['author'];
        $price = $row['price'];
        $genre = $row['genre']; // Changed 'category' to 'genre'
    } else {
        echo "Book not found.";
        exit(); // Exit the script if book is not found
    }
    $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
<!-- Update books form -->
<h2><u>Update Book Information</u></h2>
<form method="POST" onsubmit="return confirmUpdate();">
    <label for="title">Book Title:</label>
    <input type="text" name="title" value="<?= isset($title) ? htmlspecialchars($title) : '' ?>">
    <br><br>

    <label for="author">Author:</label>
    <input type="text" name="author" value="<?= isset($author) ? htmlspecialchars($author) : '' ?>">
    <br><br>

    <label for="price">Price:</label>
    <input type="number" name="price" value="<?= isset($price) ? $price : '' ?>">
    <br><br>

    <label for="genre">Genre:</label> <!-- Changed 'category' to 'genre' -->
    <input type="text" name="genre" value="<?= isset($genre) ? htmlspecialchars($genre) : '' ?>"> <!-- Changed 'category' to 'genre' -->
    <br><br>
    <input type="submit" name="update" value="Update">
</form>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    // Retrieve updated values from form
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $genre = $_POST['genre']; // Changed 'category' to 'genre'

    // Update the book in the database (prepared statement again for security)
    $stmt = $connection->prepare("UPDATE books SET title=?, author=?, price=?, genre=? WHERE book_id=?");
    $stmt->bind_param("ssdsi", $title, $author, $price, $genre, $book_id); // Changed 'category' to 'genre'
    if ($stmt->execute()) {
        // Redirect to bookview.php or any appropriate page
        header('Location: bookview.php');
        exit(); // Ensure no other content is sent after redirection
    } else {
        echo "Error updating book: " . $stmt->error;
    }

    $stmt->close(); // Close the statement after use
}

// Close the connection (important to close after use)
$connection->close();
?>
