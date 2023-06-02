<?php 
include_once "auth.php";
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Курсовая работа</title>
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="news.css">
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

<?php
    $result_news = $link->query("SELECT * FROM news order by id_news desc");
    //добавляем новости
    while ($row = $result_news->fetch_assoc()) {
        $name = $row['news_tag'];
        $news = $row['news'];
        echo '<table class="news_wrapper">';
        echo '<tr class="news_name"><th colspan="2">' .$name. '</th></tr>';
        echo '<tr>';
        echo '<td class="news_photo"><img src="'.$row['photo'].'"></td>';
        echo '<td class="news_text">'.$news.'</td>';
        echo '</tr>';
        echo '</table>';
    }

?>

</div>
</body>
</html>