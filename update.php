<?php

include('connection.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = "SELECT * FROM students WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $student = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', 
              phone='$phone', course='$course' WHERE id=$id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: read.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        input { margin: 10px 0; padding: 8px; width: 300px; }
        button { padding: 10px 20px; background: #4CAF50; color: white; border: none; }
    </style>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        <input type="text" name="name" value="<?php echo $student['name']; ?>" required><br>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>
        <input type="tel" name="phone" value="<?php echo $student['phone']; ?>" required><br>
        <input type="text" name="course" value="<?php echo $student['course']; ?>" required><br>
        <button type="submit" name="update">Update Student</button>
    </form>
</body>
</html>