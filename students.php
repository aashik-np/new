<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Manage Students</h2>
        <!-- Code for displaying and managing students -->
        <!-- Example: Fetching students from database and displaying in a table -->
        <?php
        $result = $conn->query("SELECT * FROM students");
        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered'><tr><th>ID</th><th>Name</th><th>Grade</th><th>Actions</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["grade"]."</td>";
                echo "<td><a href='edit_student.php?id=".$row["id"]."' class='btn btn-info'>Edit</a> ";
                echo "<a href='delete_student.php?id=".$row["id"]."' class='btn btn-danger'>Delete</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "No students found.";
        }
        ?>
    </div>
</body>
</html>
