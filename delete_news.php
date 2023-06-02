<?php
include_once "auth.php";
session_start();

//обработка отправленных данных для удаления
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $news = $_POST['news_to_delete'];

    $sql = "DELETE FROM news WHERE news_tag = '$news'";
    mysqli_query($link, $sql);

    header('Location: foradmin.php');
    exit;
}
?>