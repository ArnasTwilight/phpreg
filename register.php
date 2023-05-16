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
<form action="vendor/signup.php" method="post">
    <label for="login">Login</label>
    <input type="text" name="login" placeholder="Enter login">

    <button type="submit">Register</button>

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
</body>
</html>