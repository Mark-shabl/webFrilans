<?php

session_start();

    $emailform=$_GET['email'];
    $ferstnameform=$_GET['ferstname'];
    $loginform=$_GET['login'];
    $nameform=$_GET['name'];
    $oSebeform=$_GET['oSebe'];
    $passwordform=password_hash($_GET['password2'], PASSWORD_DEFAULT,['cost' => 12]);
    if (isset($_GET['check_agreements'])) {
        // если флажок отмечен
        $check_agreementsform='1';
    } else {
        $check_agreementsform='0';
    }

    require_once "include/db.php";
    if(!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) and (!filter_var($_GET['login'], FILTER_VALIDATE_EMAIL))) {
        exit('Invalid email address or login'); 
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
        $oSebe = '"' .$mysqli->real_escape_string($oSebeform).'"';
        $password = '"' .$mysqli->real_escape_string($passwordform).'"';
        $check_agreements = '"' .$mysqli->real_escape_string($check_agreementsform).'"';

        $query = "INSERT INTO `FrilansPipl`(email, login, name, ferstname,about_me, password_hash, registr_data,check_agreements) 
        VALUES ($email,$login,$name,$ferstname,$oSebe,$password,NOW(),$check_agreements)";
        $result=$mysqli->query($query);
        $mysqli->close;      
    }
    
    require_once __DIR__ .'/email/mailPassword.php';
    header("Location: /endRig.php");
    
?>