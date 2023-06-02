<?php
session_start();

// Проверка наличия сеанса и авторизации
if (isset($_SESSION["login"])) {
    // Если пользователь уже авторизован, перенаправляем на защищенную страницу
    header("Location: discuss.php");
    exit;
}

function generateSalt()
{
    // Генерация случайной строки
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $salt = '';

    for ($i = 0; $i < $length; $i++) {
        $salt .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $salt;
}

$link = mysqli_connect("localhost", "pma", "1369546", "kayumova_a");

if ($link == false) {
    echo "Ошибка соединения<br>";
} 
else {
    echo "Соединение установлено<br>";
    // вход
    if (isset($_POST['vhod'])) {
        $login = $_POST["login"];
        $password = $_POST["password"];

        // Получение хэша пароля и соли из базы данных
        $sql = "SELECT pass, salt FROM users WHERE login = '$login'";
        $result = $link->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPassfromSQL = $row["pass"];
            $salt = $row["salt"];

            // Хэширование введенного пароля с использованием соли
            $hashedPassword = hash('sha256', $password . $salt);

            // Сравнение хэшей паролей
            if ($hashedPassword == $hashedPassfromSQL) {
                // Авторизация прошла успешно
                $_SESSION["login"] = $login;

                //Данные для распознавания админа
                $sql2 = "SELECT role FROM roles WHERE pass = '$hashedPassword'";
                $result_admin = $link->query($sql2);
                if ($result_admin->num_rows == 1){
                    $res_role = $result_admin->fetch_assoc();
                    $_SESSION["role"] = $result_admin;
                    header("Location: foradmin.php");
                    exit;
                }
                else {
                    header("Location: cabinet.php");
                    exit;
                }
            } 
            else {
                echo "Неверный логин или пароль.";
            }
        } 
        else {
            echo "Неверный логин или пароль.";
        }
    }

    //регистрация
    if (isset($_POST['registration'])) {
        $login = $_POST["login"];
        $password = $_POST["password"];

        //генерация случайной соли
        $salt = generateSalt();

        // Хэширование пароля с использованием соли
        $hashedPassword = hash('sha256', $password . $salt);

        // Вставка данных в базу данных
        $sql = "INSERT INTO users (login, pass, salt) VALUES ('$login', '$hashedPassword', '$salt')";

        if ($link->query($sql) === TRUE) {
            // Регистрация успешна, перенаправляем на страницу личного кабинета
            session_start();
            $_SESSION["login"] = $login;
            
            header("Location: cabinet.php");
            exit;
        } else {
            echo "Ошибка регистрации: " . $link->error;
    }

}
        
   }
    mysqli_close($link);
?>