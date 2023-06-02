<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="cabinet.css">
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

    <div class="window">
        <?php
        $classname = "login";
        $username = $_SESSION["login"];
           
        echo "<div class=".$classname."> Добро пожаловать, $username! </div>"
        ?>
        <form method="post" action="clear_session.php" class="form">
            <input type="submit" name="exit"  class ="but1" value="Выйти из профиля">
        </form>
    </div>

</div>
</body>
</html>