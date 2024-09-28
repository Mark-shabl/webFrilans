<?php

session_start();

    $emailform=$_GET['email'];
    $ferstnameform=$_GET['ferstname'];
    $loginform=$_GET['login'];
    $nameform=$_GET['name'];
    $fotoform=$_GET['foto'];
    $oSebeform=$_GET['oSebe'];
    $passwordform=$_GET['password2'];
    
    if (isset($_GET['puh'])) {

        require_once "include/db.php";

    

        $email = '"' .$mysqli->real_escape_string($emailform).'"';
        $ferstname = '"' .$mysqli->real_escape_string($ferstnameform).'"';
        $login = '"' .$mysqli->real_escape_string($loginform).'"';
        $name = '"' .$mysqli->real_escape_string($nameform).'"';
        $foto = '"' .$mysqli->real_escape_string($fotoform).'"';
        $oSebe = '"' .$mysqli->real_escape_string($oSebeform).'"';
        $password = '"' .$mysqli->real_escape_string($passwordform).'"';

        $query = "INSERT INTO `FrilansPipl`(email, login, name, ferstname, foto, about_me, password_hash, registr_data) 
        VALUES ($email,$login,$name,$ferstname,$foto,$oSebe,$password,NOW())";
        $result=$mysqli->query($query);
        if($result){ 
            print('Успех!!!');
        }
        $mysqli->close;
    }
?>