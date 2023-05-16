<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
require_once 'connect.php';

$login = $_POST['login'];
$password = bin2hex(random_bytes(4));

if (!empty($login)) {

    $sql = 'SELECT * FROM users WHERE login = :login';
    $result = $connect->prepare($sql);
    $result->bindParam(':login', $login, PDO::PARAM_STR);
    $result->execute();
    $userData = $result->fetch(PDO::FETCH_ASSOC);

    if (!$userData['login'] == $login) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $result = $connect->query("INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$password_hash')");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        echo 'You redirect to Home page after 10 sec, please save your password:' . $password;

        $_SESSION['message'] = 'Success!';

        header('Refresh: 10; url=/index.php');
    } else {
        $_SESSION['message'] = 'This user already exists';
        header('Location: ../register.php');
    }

} else {
    $_SESSION['message'] = 'Login not set';
    header('Location: ../register.php');
}
