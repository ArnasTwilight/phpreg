<?php
$params['host'] = 'localhost';
$params['dbname'] = 'phpreg';
$params['user'] = 'root';
$params['password'] = 'root';

$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
$connect = new PDO($dsn, $params['user'], $params['password']);