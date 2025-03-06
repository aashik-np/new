<?php
include('connection.php');

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        // Insert new user into database
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $query)) {
            header("Location: home.php");
            exit;
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    } else {
        $error = "Username already exists!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 300px; margin: 100px auto; }
        input { margin: 10px 0; padding: 8px; width: 100%; }
        button { padding: 10px; background: #4CAF50; color: white; border: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>School Sign Up</h2>
        <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
        <p>Already have an account? <a href="index.php">Login</a></p>
    </div>
</body>
</html>
