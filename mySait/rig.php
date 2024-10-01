<?php

session_start();

    $emailform=$_GET['email'];
    $ferstnameform=$_GET['ferstname'];
    $loginform=$_GET['login'];
    $nameform=$_GET['name'];
    $fotoform=$_GET['foto'];
    $oSebeform=$_GET['oSebe'];
    $passwordform=$_GET['password2'];

    require_once "include/db.php";
    if(!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) and (!filter_var($_GET['login'], FILTER_VALIDATE_LOGIN))) {
        exit('Invalid email address or login'); // Use your own error handling ;)
      }
       $select = mysqli_query( $mysqli, "SELECT email FROM FrilansPipl WHERE email = '".$_GET['email']."'") or exit(mysqli_error( $mysqli));
       if(mysqli_num_rows($select)) {
        $_SESSION['errorEmail'] = 'Этот адрес электронной почты уже используется';
        header("Location:/index_registration.php");
           exit;
       }
       $select = mysqli_query( $mysqli, "SELECT login FROM FrilansPipl WHERE login = '".$loginform."'") or exit(mysqli_error( $mysqli));
       if(mysqli_num_rows($select)) {
        
        $_SESSION['errorLogin'] = 'Этот логин уже используется';
        header("Location:/index_registration.php");
           exit;    
       }
       if (isset($_GET['puh'])) {
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