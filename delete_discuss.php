<?php
include_once "auth.php";
session_start();
header('Content-Type: text/html; charset=utf-8');

//обработка отправленных данных для удаления
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dis = $_POST['dis_to_delete'];

    $sql5 = "DELETE FROM discussions WHERE theme = '$dis'";
    mysqli_query($link, $sql5);

    header('Location: foradmin.php');
    exit;
}
?>