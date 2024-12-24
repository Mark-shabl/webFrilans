<?php
session_start();

$image=$_GET['image'];
$nameProjectform=$_GET['nameProject'];
$descriptionform=$_GET['description'];
$idPackform=$_GET['idPack'];
$idUserform =  $_SESSION['user_data']['id_data'];

require_once $_SERVER['DOCUMENT_ROOT']. "/include/db.php";

if (isset($_GET['GO'])) {
    $nameProject = '"' .$mysqli->real_escape_string($nameProjectform).'"';
    $description = '"' .$mysqli->real_escape_string($descriptionform).'"';
    $idPack = '"' .$mysqli->real_escape_string($idPackform).'"';
    $idUser = '"' .$mysqli->real_escape_string($idUserform).'"';
    

    $query = "INSERT INTO `Projects`(nameProject, data, description, idPack,idUser) 
    VALUES ($nameProject,NOW(),$description,  $idPack,$idUser)";
    $result=$mysqli->query($query);
    if($result) {
        $_SESSION['аdd_folder'] = 'Проект успешно добавлено';
        header("Location:/home/homePage.php");
        exit(0);
        $mysqli->close;    
    
    }   else    {
        $_SESSION['аdd_folder_fail'] = 'Проект не добавлена';
        header("Location:/home/homePage.php");
        exit(0);
        $mysqli->close; 
    }
}
?>