<?php
include_once "auth.php";
session_start();

//обработка отправленных данных для удаления
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user_to_delete'];
    echo $user;
    $sql = "DELETE FROM users WHERE login = '$user'";
    mysqli_query($link, $sql);

    header('Location: foradmin.php');
    exit;
}
?>