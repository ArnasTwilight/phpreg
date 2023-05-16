<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<form action="vendor/signin.php" method="post">
    <label for="Login">Login</label>
    <input type="text" name="login" placeholder="Enter login">
    <label for="Login">Password</label>
    <input type="password" name="password" placeholder="Enter password">

    <button type="submit">Login</button>

    <?php
    if ($_SESSION['message']) {
        echo '
           <p class="message">
              ' . $_SESSION['message'] . '
           </p>
        ';
    }
    unset ($_SESSION['message']);
    ?>
</form>

<a href="/register.php">Registration</a>
</body>
</html>
