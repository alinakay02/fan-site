<?php
include "auth.php";
session_start();
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет администратора</title>
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="foradmin.css">
</head>
<body>
<p class="name_of_site">Фансайт сериала "Царство"</p>
<div class="main_app">
<!-- навигация-->
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
        echo "<div class=".$classname."> Привет, админ </div>"
        ?>
        <form method="POST" action="clear_session.php" class="form">
            <input type="submit" name="exit"  class ="but1" value="Выйти из профиля">
        </form>
  </div>

<!--  пользователи-->
  <div class="users">
    <div class="all_users">
      <p class="all">Все пользователи</p>
      <?php 
      //вывод всех пользователей
        $res_users = $link->query("SELECT login FROM users order by id_user desc");

        while ($row_user = $res_users->fetch_assoc()){
          $login = $row_user['login'];
          if ($login != $_SESSION['login']) {         //выводим всех, кроме текущего 
            echo '<div class="user_wrap">';
            echo '<p class="logins">'.$login.'</p>';
            echo '</div>';
          }
        }
      ?>
    </div>
    <div class="delete_user">
      <form method="post" action="delete_user.php">
        <p class="delete">Удаление пользователя</p>
        <p class="name_to_delete">Введите логин пользователя, которого хотите удалить:</p>
        <textarea name="user_to_delete" rows="2" cols="50" required></textarea>
        <button class="del_but" type="submit">Удалить</button>
      </form>
    </div>
  </div>

<!--  обсуждения-->
  <div class="to_discus">
    <div class="all_discuss">
      <p class="all">Все обсуждения</p>

        <?php
        // вывод всех обсуждений
          $res_dis = $link->query("SELECT theme FROM discussions order by id_dis desc");

          while($row_dis = $res_dis->fetch_assoc()){
            $dis = $row_dis['theme'];
            echo '<div class="discus_wrap">';
            echo '<p class="logins">'.$dis.'</p>';
            echo '</div>';
          }
        ?>

    </div>
    <div class="delete_discuss">
      <form method="POST" action="delete_discuss.php">
        <p class="delete">Удаление обсуждения</p>
        <p class="name_to_delete">Введите название обсуждения, которое хотите удалить:</p>
        <textarea name="dis_to_delete" rows="2" cols="50" required></textarea>
        <button class="del_but" type="submit">Удалить</button>
      </form>
    </div>
  </div>
<!--  новости-->
  <div class="news">
    <div class="all_news">
      <p class="all">Все новости</p>

      <?php
      //вывод всех новостей
          $res_news = $link->query("SELECT news_tag FROM news order by id_news desc");

          while($row_news = $res_news->fetch_assoc()){
            $news = $row_news['news_tag'];
            echo '<div class="news_wrap">';
            echo '<p class="logins">'.$news.'</p>';
            echo '</div>';
          }
        ?>

    </div>
    <div class="delete_news">
      <form method="post" action="delete_news.php">
        <p class="delete">Удаление новости</p>
        <p class="name_to_delete">Введите название новости, которую хотите удалить</p>
        <textarea name="news_to_delete" rows="2" cols="50" required></textarea>
        <button class="del_but" type="submit">Удалить</button>
      </form>
    </div>
  </div>

<!--  добавление новости-->
  <div class="add_news">
    <form method="POST" action="add_news.php">
      <p class="add_title">Добавление новости</p>
      <p class="news_title">Название новости</p>
      <textarea name="theme" rows="2" cols="100" required></textarea>
      <p class="add_photo">Название фото</p>
      <textarea name="photo" rows="2" cols="100" required></textarea>
      <p class="add_text">Текст новости</p>
      <textarea name="news_text" rows="6" cols="100" required></textarea><br>
      <button class="publish" type="submit">Опубликовать</button>
    </form>
  </div>
</div>

<script>
    CKEDITOR.replace('editor');
</script>
</body>
</html>