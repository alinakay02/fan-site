<?php
include_once "auth.php";
session_start();
//обработка отправленных данных для обсуждений
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $username = $_SESSION['login'];
 //нахождение id_user
    $sql1 = "SELECT id_user FROM users WHERE login = '$username'";
    $result_user = mysqli_query($link, $sql1);
    $user = mysqli_fetch_assoc($result_user);
    $id_user = $user['id_user'];
 //нахождение id_dis
    $id_dis = $_POST['post_id'];
 //добавление в базу данных новой записи
    $sql = "INSERT INTO comm_for_dis (id_dis, id_user, comm, username) VALUES ('$id_dis', '$id_user', '$content', '$username')";
    mysqli_query($link, $sql);
    
    header('Location: discuss.php');
    exit;
   
}

?>