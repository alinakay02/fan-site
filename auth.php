<?php
$link = mysqli_connect("localhost", "pma", "1369546", "kayumova_a");
mysqli_set_charset($link, "utf8");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
?>