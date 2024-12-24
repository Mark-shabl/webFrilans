<?php session_start();

if(!isset($_SESSION['status_entry'])){
    $_SESSION['status'] = 'Вы не автаризованы!';
    header('Location: door.php');
    exit(0);
}
?>