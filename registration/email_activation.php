<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';
 //echo($_GET['token']);
    if(isset($_GET['token']))   {
        $token = $_GET['token'];
        $verify_token = "SELECT verify_token, status FROM FrilansUser WHERE verify_token = '$token' LIMIT 1";
        $verify_token_run = mysqli_query($mysqli, $verify_token);

        if(mysqli_num_rows($verify_token_run) > 0)    {

            $row = mysqli_fetch_array($verify_token_run);
            if($row['status'] == "0")    {

                $cliced_token = $row['verify_token'];
                $update_query = "UPDATE FrilansUser SET status='1' WHERE verify_token='$cliced_token' LIMIT 1";
                $update_query_run = mysqli_query($mysqli,$update_query);

                if($update_query_run)  {

                    $_SESSION['status1'] = "Ваша учетная запись успешно актевирована";
                    header("Location: //mySait/door.php");
                    exit(0);
                    $mysqli->close;

                }   else   {

                    $_SESSION['status'] = "Проверка не удалась.";
                    header("Location: //mySait/door.php");
                    exit(0);
                    $mysqli->close;

                }

            }   else   {

                $_SESSION['status'] = "Почта уже проверен.";
                header("Location: //mySait/door.php");
                exit(0);
                $mysqli->close;

            }

        }   else   {

            $_SESSION['status'] = "Этот токен не существует";
            header("Location: //mySait/door.php");
            exit(0);
            $mysqli->close;

        }
    }   else   {

        $_SESSION['status'] = "нет разрешения на активацию";
        header("Location: //mySait/door.php");
        exit(0);
        $mysqli->close;

    }

?>


