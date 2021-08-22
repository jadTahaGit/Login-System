<?php

include 'config.php';

error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    // $password = md5($_POST['password']);
    // $confirm_password = md5($_POST['confirm_password']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if ($password == $confirm_password) {
        $sql = "SELECT * FROM users Where email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
            VALUES('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Added Successfully')</script>";
                $username = "";
                $email = "";
                $password = "";
                $confirm_password = "";
            } else {
                echo "<script>alert('Woops! Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists')</script>";
        }
    } else {
        echo "<script>alert('Password didn\'t Match.')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <h1>Signup</h1>

            <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required />

            <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required />

            <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required />

            <input type="password" placeholder="Confirm Password" name="confirm_password"
                value="<?php echo $confirm_password; ?>" required />

            <button name="submit">Register</button>

            <p>Have an Account? <a href="index.php">Login Here</a>.</p>
        </form>
    </div>
</body>

</html>
