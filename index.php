<?php
include_once "auth.php";
header('Content-Type: text/html; charset=utf-8');
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каюмова Алина. Курсовая работа. Фансайт</title>
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<p class="name_of_site">Фансайт сериала "Царство"</p>
<!-- Тело страницы -->
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
<!-- Для слайдшоу -->
    <div class="container">
    <?php
        $result_img = $link->query("SELECT * FROM photo_carusel");

        //добавляем карусель с фото
        while ($row = $result_img->fetch_assoc()) {
            echo '<div class="mySlides fade"><img src= "'. $row['photo'] .'"></div>';
        }
    ?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
<!-- Конец слайдшоу -->

    <div class="dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <div class="about_serial">
        <?php
            $result_serial = $link->query("SELECT info FROM about_serial");
            while ($row_ser = $result_serial->fetch_assoc()){
                echo '<p> <span class="serial">Царство </span>' .$row_ser['info']. '</p>';
            }
        ?>
    </div>
    <div class="about_seasons">
        <?php 
            $result_about_seasons = $link->query("SELECT * FROM about_season");
            
            $i = 0;
            $n = 1;
            
            while ($row_s = $result_about_seasons->fetch_assoc()){
                $about_ser = $row_s['about'];
                echo '<div class="season_wrapper">';
                echo '<div class="season_name">' .$n. 'Сезон</div>';
                echo '<div class="show_about">';
                echo '<button class="but" onclick="show_info('.$i.')">&#9670; </button>';
                echo '</div>';
                echo '</div>';
                echo '<div class="season_about have">' .$about_ser. '</div>';
                $i += 1;
                $n += 1;
            }
        ?>
    </div>
</div>

<script src="index.js"></script>

</body>
</html>