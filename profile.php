<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<form>
    <h2> <?= $_SESSION['user']['login'] ?> </h2>

    <a href="vendor/logout.php">Logout</a>
</form>

</body>
</html>
