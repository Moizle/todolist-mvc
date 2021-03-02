<?php
    $dsn = 'mysql:host=localhost;dbname=todolist';
    $username = 'root';

    try {
    $db = new PDO($dsn, $username);
    } catch (PDOException $err) {
    $error = 'Database Error: ';
    $error .= $err->getMessage();
    include('view/error.php');
    exit();
    }
?>