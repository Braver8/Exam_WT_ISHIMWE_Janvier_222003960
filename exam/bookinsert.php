<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert data into books table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $author = $_POST["author"];
  $genre = $_POST["genre"];
  $description = $_POST["description"];
  $publication_year = $_POST["publication_year"];
  $price = $_POST["price"];

  // File upload handling
  $file_name = $_FILES["book_file"]["name"];
  $file_size = $_FILES["book_file"]["size"];
  $file_type = $_FILES["book_file"]["type"];
  $file_temp = $_FILES["book_file"]["tmp_name"];
  $upload_date = date("Y-m-d H:i:s");

  // Ensure the uploads directory exists
  $target_dir = "uploads/";
  if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
  }

  $target_file = $target_dir . basename($file_name);

  if (move_uploaded_file($file_temp, $target_file)) {
    // File uploaded successfully, insert data into database
    $sql = "INSERT INTO books (title, author, genre, description, publication_year, price, file_name, file_size, file_type, upload_date) VALUES ('$title', '$author', '$genre', '$description', '$publication_year', '$price', '$file_name', '$file_size', '$file_type', '$upload_date')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Error uploading file";
  }
}

$conn->close();
?>
