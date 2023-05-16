<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($password) && !empty($login)) {
    $sql = 'SELECT * FROM users WHERE login = :login';
    $result = $connect->prepare($sql);
    $result->bindParam(':login', $login, PDO::PARAM_STR);
    $result->execute();
    $userData = $result->fetch(PDO::FETCH_ASSOC);

    $passwordVerify = password_verify($password, $userData['password']);
}

if ($passwordVerify) {
    $_SESSION['user'] = [
        "id" => $userData['id'],
        "login" => $userData['login'],
    ];

    header('Location: ../profile.php');

} else {
    $_SESSION['message'] = 'Login or password not correct';
    header('Location: ../index.php');
}