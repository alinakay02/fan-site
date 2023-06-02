<?php
include_once "auth.php";
session_start();

//обработка отправленных данных для обсуждений
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $news_name = $_POST['theme'];
    $photo = $_POST['photo'];
    $news_text = $_POST['news_text'];

    $sql = "INSERT INTO news (news_tag, photo, news) VALUES ('$news_name', '$photo', '$news_text')";
    mysqli_query($link, $sql);

    header('Location: foradmin.php');
    exit;
}

?>