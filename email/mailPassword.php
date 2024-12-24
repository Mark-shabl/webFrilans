<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $settings = require_once __DIR__. '/settingsEmail.php';
    require_once __DIR__ . '/functionsEmail.php';

    $body=
    "<h1>Здравствуйте!</h1> 
    <br/> <br/> 
    Мы должны убедиться в том, что вы человек. 
    Пожалуйста, подтвердите адрес вашей электронной почты, и можете начать использовать ваш аккаунт на
     <a href='http://mysait/registration/email_activation.php?token=$verify_tokenform'> сайте. </a>  ";

    var_dump(send_mail($settings['mail_settings_prod'],[$emailform],'Подтверждение почты',$body));
    echo('удалось');
?>