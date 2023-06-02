<?php
include "auth.php";

session_start();
header('Content-Type: text/html; charset=utf-8');
// Проверка наличия сеанса и авторизации
if (!isset($_SESSION["login"])) {
    // Если пользователь не авторизован, перенаправляем на страницу входа 
    header("Location: authorization.php");
    exit;
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Курсовая работа</title>
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="discuss.css">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
            <div class="nav"><a href="authorization.php">Обсуждения</a></div>
            <div class="nav"><a href="authorization.php">Профиль</a></div>
        </div>
    </div>

    <!--    добавление обсуждения-->
    <div class="add_new_discuss">
        <form method="POST" action="add_discuss.php" class = "add_new_discuss">
            <p class="new_theme">Новая тема для обсуждения</p>
            <textarea class="new_theme" name="theme" rows="2" cols="100" required></textarea>
            <p class="dis_content">Cодержимое</p>
            <textarea class="dis_content" name="content" rows="4" cols="100" required></textarea><br>
            <button class="add_new_theme" type="submit">Добавить</button>
        </form>
    </div>
<!--    конец-->

    <p class="all_dis">Все обсуждения</p>

<!-- вывод всех обсуждений -->
<?php 
    $result_dis = $link->query("SELECT * FROM discussions order by id_dis desc");
    
    $i = 0;
    //оболочка для обсуждений
    while ($row = $result_dis->fetch_assoc()) {
        $theme = $row['theme'];
        $content = $row['text_dis'];
        $username = $row['username'];;
        $id_dis = $row['id_dis'];

        $result_com = $link->query("SELECT * FROM comm_for_dis WHERE id_dis = $id_dis");

        echo '<div class="discuss_wrapper">';
        echo '<div class="discuss_name">'.$theme.'</div>';
        echo '<button class="but_dis " onclick="show_discuss('.$i.')">Показать обсуждение</button>';
        echo '<div class="discuss not_show">';
        echo '<div class="discuss_to_show">';
        echo '<p class="discuss_text"><span class="user_name">'.$username.'</span></p>';
        echo '<p class="dis_txt">'.$content.'</p>';

        //оболочка для комментариев
        while ($row_comment = $result_com->fetch_assoc()){
            $user = $row_comment['username'];
            $comment = $row_comment['comm'];
            echo '<div class="comments">';
            echo '<p class="discuss_text"><span class="user_name">'.$user.'</span></p>';
            echo '<p class="dis_txt">'.$comment.'</p>';
            echo '</div>';
        }
        echo '</div>';
        echo '<form method="POST" action="add_to_dis.php" class="form" onsubmit="return comm('.$i.')">';
        echo '<input type="hidden" name="post_id" value="'.$id_dis.'">';
        echo '<textarea name="content" class = "textarea_sv"></textarea><br>';
        echo '<button type="submit" ">Комментировать</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        $i +=1;
    }
?>
</div>

<script src="index.js">
    CKEDITOR.replace('editor');
</script>

</body>
</html>