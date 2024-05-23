<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file is selected
    if(isset($_FILES["fileToUpload"])) {
        $file = $_FILES["fileToUpload"];

        // File properties
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Check if file is uploaded without errors
        if ($fileError === 0) {
            // Move uploaded file to desired location (e.g., a folder named 'uploads')
            $uploadDir = 'uploads/';
            $uploadPath = $uploadDir . $fileName;
            move_uploaded_file($fileTmpName, $uploadPath);

            // Insert file details into database
            // Make sure to establish database connection first

            // SQL to insert file details into a 'books' table
            $sql = "INSERT INTO books (name, size, path) VALUES ('$fileName', '$fileSize', '$uploadPath')";

            // Execute SQL query
            if ($conn->query($sql) === TRUE) {
                echo "Book uploaded successfully";
            } else {
                echo "Error uploading book: " . $conn->error;
            }

            // Close database connection
            $conn->close();
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "No file selected";
    }
}
?>
