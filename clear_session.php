<?php
include "auth.php";

// Удаление данных из сессии
if (isset($_POST['exit'])) {
    session_id("session1");
    session_start();
    unset($_SESSION['login']);
    session_destroy();

    session_id("session2");
    session_start();
    unset($_SESSION['role']);
    session_destroy();
    header("Location: authorization.php");
    exit;
}
?>