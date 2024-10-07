<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $settings = require_once __DIR__. '/settingsEmail.php';
    require_once __DIR__ . '/functionsEmail.php';

    $body='Здравствуйте! <br/> <br/> Мы должны убедиться в том, что вы человек. Пожалуйста, подтвердите адрес вашей электронной почты, и можете начать использовать ваш аккаунт на сайте. <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';


    var_dump(send_mail($settings['mail_settings_prod'],[$emailform],'Подтверждение почты',$body));
?>