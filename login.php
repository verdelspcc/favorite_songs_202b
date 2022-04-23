<?php 
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login page</h1>
    <form method="POST">
        <?php 
            if (isset($_GET['error'])) {
                echo $_GET['error'];
            }
        ?>
        <br>
        <label>Username</label>
        <input type="text" name="username" />
        <br>
        <label>Password</label>
        <input type="password" name="password" />
        <br>
        <button type="submit" name="submit">Login</button>
    </form>

    <?php 
        include 'db_connection.php';

        if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $md5Password = md5($password);

            $sql = "SELECT * FROM users WHERE
                username='$username' AND password='$md5Password'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['fullName'] = $row['fullName'];
                $_SESSION['username'] = $row['username'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=Username or Password is incorrect.");
            }

            mysqli_close($conn);
        }
    ?>
</body>
</html>