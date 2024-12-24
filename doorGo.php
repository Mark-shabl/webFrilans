<?php session_start();

require_once $_SERVER['DOCUMENT_ROOT']. "/include/db.php";

if (isset($_GET['go'])) {

    if(!empty(trim($_GET['login'])) && !empty(trim($_GET['password']))) {
        
        $loginform = mysqli_real_escape_string($mysqli,$_GET['login']);
        $passwordform=$_GET['password'];
        
        $query = "SELECT *  FROM FrilansUser WHERE email = '$loginform' or login = '$loginform'  LIMIT 1";
        $query_run = mysqli_query($mysqli,$query);

        if(mysqli_num_rows($query_run) > 0 )    {

            $array_db = mysqli_fetch_assoc($query_run);
            $passCheck = $array_db['password_hash'];
            
            if (password_verify($passwordform, $passCheck)){

                $statusCheck = $array_db['status'];
                if($statusCheck == "1"){

                    $_SESSION['status_entry'] = true;
                    $_SESSION['user_data'] = [
                        'id_data' => $array_db['id'],
                        'email_data' => $array_db['email'],
                        'login_data' => $array_db['login'],
                        'name_data' => $array_db['name'],
                        'ferstname_data' => $array_db['ferstname'],
                        'about_me_data' => $array_db['about_me'],
                        'images_data' => $array_db['images'],
                        'verify_token_data' => $array_db['verify_token'],
                        'employment_data' => $array_db['employment'],
                    ];
                    header('Location: index.php');
                    exit(1);
                    $mysqli->close;

               } else {

                $_SESSION['status'] = 'Аккаунт не активирован';
                header('Location: door.php');
                exit(0);
                $mysqli->close;

               }
            

            } else {
                $_SESSION['status'] = 'Неверный пароль';
                header('Location: door.php');
                exit(0);
                $mysqli->close;
            }

        }   else {

        $_SESSION['status'] = 'Такой пользователь не зарегистрираван.';
        header('Location: door.php');
        exit(0);
        $mysqli->close;

        }
    
    } else {
        $_SESSION['status'] = 'Все поля обязательны для заполнения.';
        header('Location: door.php');
        exit(0);
        $mysqli->close;
    }

}

?>
