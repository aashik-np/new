<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}
include('connection.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $query = "INSERT INTO students (name, email, phone, course) 
              VALUES ('$name', '$email', '$phone', '$course')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        input, select { margin: 10px 0; padding: 8px; width: 300px; }
        button { padding: 10px 20px; background: #4CAF50; color: white; border: none; }
    </style>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="tel" name="phone" placeholder="Phone Number" required><br>
        <input type="text" name="course" placeholder="Course" required><br>
        <button type="submit" name="submit">Add Student</button>
    </form>
</body>
</html>