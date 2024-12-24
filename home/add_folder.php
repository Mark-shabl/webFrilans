<?php
session_start();

$folderNameform=$_GET['folderName'];
$idUserform =  $_SESSION['user_data']['id_data'];

require_once $_SERVER['DOCUMENT_ROOT']. "/include/db.php";

if (isset($_GET['GO'])) {
    $folderName = '"' .$mysqli->real_escape_string($folderNameform).'"';
    $idUser = '"' .$mysqli->real_escape_string($idUserform).'"';
    

    $query = "INSERT INTO `PackProjects`(folderName, data, idUser) 
    VALUES ($folderName,NOW(),$idUser)";
    $result=$mysqli->query($query);
    if($result) {
        $_SESSION['аdd_folder'] = 'Папка успешно добавлено';
        header("Location:/home/homePage.php");
        exit(0);
        $mysqli->close;    
    
    }   else    {
        $_SESSION['аdd_folder_fail'] = 'Папка не добавлена';
        header("Location:/home/homePage.php");
        exit(0);
        $mysqli->close; 
    }
}
?>