<?php

include('config.php');

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header('Location: welcome.php');
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (!empty($result) && mysqli_num_rows($result) > 0) {
        //check password:    
        $sql = "SELECT * FROM users WHERE password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (!empty($result) && mysqli_num_rows($result) > 0) {
            //open a new session:
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            //Go to a new page:
            header("Location: welcome.php");
            echo "<script>alert('Loged in Successfully')</script>";
        } else {
            echo "<script>alert('Wrong Password')</script>";
        }
    } else {
        echo "<script>alert('Email not founded')</script>";
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
        <form action="" method="post">
            <h1>Login</h1>
            <input type="email" placeholder="Email" name="email" value="<?php echo $username; ?>" />
            <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" />
            <button name="submit">Login</button>
            <p>Don't have an Account? <a href="register.php">Register Here</a>.</p>
        </form>
    </div>
</body>

</html>
