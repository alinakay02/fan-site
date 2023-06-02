<?php
include_once "auth.php";
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Курсовая работа</title>
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="heroes.css">
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
    $result_hero = $link->query("SELECT * FROM heroes");

    //добавляем героев
    while ($row = $result_hero->fetch_assoc()) {
        $name = $row['name'];
        $hero_about = $row['info_about'];
        echo '<table class="hero_wrapper">';
        echo '<tr class="name"><th colspan="2">' .$name. '</th></tr>';
        echo '<tr>';
        echo '<td class="about_hero">'.$hero_about.'</td>';
        echo '<td class="hero_photo"><img src="'.$row['photo'].'"></td>';
        echo '</tr>';
        echo '</table>';
    }

?>

</div>
</body>
</html>