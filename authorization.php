<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
// Проверка наличия сеанса и авторизации
if (isset($_SESSION["login"])) {
    //Данные для распознавания админа
    if(isset($_SESSION["role"])) {
        header("Location: foradmin.php");
        exit;
    }
    //Обычный пользователь
    else {
        header("Location: cabinet.php");
    exit;
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Курсовая работа</title>
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="authorization.css">
</head>
<body>
<p class="name_of_site">Фансайт сериала "Царство"</p>
<div class="main_app">
    <!-- Навигация -->
    <div class="navigation">
        <div class="nav_wrapper">
            <div class="nav"><a href="index.php">О сериале</a></div>
            <div class="nav"><a href="heroes.php">Герои</a></div>
            <div class="nav"><a href="news.php">Новости</a></div>
            <div class="nav"><a href="discuss.php">Обсуждения</a></div>
            <div class="nav"><a href="authorization.php">Профиль</a></div>
        </div>
    </div>

    <div class="for_form">
        <p> Для возможности доступа к обсжудениям войдите или зарегистрируйтесь</p>
        <form method="post" action="connect.php" class="form">
            <p class="lp">Логин</p>
            <input type="text" name="login" required>
            <p class="lp">Пароль</p>
            <input type="text" name="password" required>
            <p class="buttons">
                <input type="submit" name="vhod"  class ="but1" value="Вход">
                <input type="submit" name="registration" class ="but2" value="Регистрация">
            </p>
        </form>
    </div>

</div>

</body>
</html>