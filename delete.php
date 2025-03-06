<?php
// Database connection
$servername = "localhost"; // Replace with your database server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "school_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed via GET request for deletion
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // SQL query to delete a student by id
    $sql = "DELETE FROM students WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $student_id); // "i" means integer type
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Student record deleted successfully.";
        } else {
            echo "No record found with that ID.";
        }

        $stmt->close();
    } else {
        echo "Error preparing the query: " . $conn->error;
    }
}

$conn->close();
?>
