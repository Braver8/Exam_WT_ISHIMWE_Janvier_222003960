  </ul>
    
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $first_name = sanitize_input($_POST["first_name"]);
    $last_name = sanitize_input($_POST["last_name"]);
    $biography = sanitize_input($_POST["biography"]);
    $website = sanitize_input($_POST["website"]);

    // Prepare SQL statement
    $sql = "INSERT INTO authors (first_name, last_name, biography, website)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute statement
    $stmt->bind_param("ssss", $first_name, $last_name, $biography, $website);
    if ($stmt->execute()) {
        echo "<script>alert('Author inserted successfully.');</script>";
    } else {
        echo "<script>alert('Error: Author not inserted.');</script>";
    }

    // Close statement
    $stmt->close();
}

// Retrieve authors from the database
$sql = "SELECT * FROM authors";
$result = $conn->query($sql);

// Display authors
if ($result->num_rows > 0) {
    echo "<h2>Authors</h2>";
    echo "<table border='1'>";
    echo "<tr><th>First Name</th><th>Last Name</th><th>Biography</th><th>Website</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["first_name"]."</td>";
        echo "<td>".$row["last_name"]."</td>";
        echo "<td>".$row["biography"]."</td>";
        echo "<td>".$row["website"]."</td>";
        echo "<td>";
        echo "<button onclick='editAuthor(".$row["author_id"].")'>Edit</button>";
        echo "<button onclick='confirmUpdate(".$row["author_id"].")'>Update</button>";
        echo "<button onclick='confirmDelete(".$row["author_id"].", \"".$row["first_name"]."\", \"".$row["last_name"]."\")'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No authors found.";
}

// Close connection
$conn->close();
?>

<script>
function editAuthor(authorId) {
    var confirmEdit = confirm("Are you sure you want to edit this author?");
    if (confirmEdit) {
        // Redirect to edit page or perform edit action
        window.location.href = "edit_author.php?id=" + authorId;
    }
}

function confirmUpdate(authorId) {
    var confirmUpdate = confirm("Are you sure you want to update this author?");
    if (confirmUpdate) {
        // Perform update action
        // You can use AJAX to update data without page refresh
        alert("Author updated successfully.");
    }
}

function confirmDelete(authorId, firstName, lastName) {
    var confirmDelete = confirm("Are you sure you want to delete " + firstName + " " + lastName + "?");
    if (confirmDelete) {
        // Perform delete action
        // You can use AJAX to delete data without page refresh
        alert("Author " + firstName + " " + lastName + " deleted successfully.");
    }
}
</script>
