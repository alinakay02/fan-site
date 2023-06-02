<?php
include_once "auth.php";
session_start();

//обработка отправленных данных для обсуждений
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme = $_POST['theme'];
    $content = $_POST['content'];
    $username = $_SESSION['login'];
    $sql = "INSERT INTO discussions (theme, text_dis, username) VALUES ('$theme', '$content', '$username')";
    mysqli_query($link, $sql);

    header('Location: discuss.php');
    exit;
    die();
}

?>