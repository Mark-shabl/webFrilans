<?php
// стартуем сессию
session_start();

unset($_SESSION['status_entry']);
unset($_SESSION['user_data']);
$_SESSION['status'] = 'Вы вышли из своего аккаунта';
require_once $_SERVER['DOCUMENT_ROOT'] . '/door.php';
exit(0);
$mysqli->close;
?>