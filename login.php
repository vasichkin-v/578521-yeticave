<?php
session_start();

require_once 'data.php';
require_once 'userdata.php';
require_once 'functions.php';


if($_POST) {

    if ($this_user = hasUser($_POST['email'], $users) )
    {

        if(password_verify($_POST['password'], $this_user['password']))
        {
            $_SESSION['user'] = $this_user;
            header('Location: /');
        }
    }

}


$tplContent = getTplContent('login.php',[
        'categorys'  => $categorys,
        ''  => '',
    ]);

$mainContent = getTplContent('layout.php', [
    "title"              => "Аутентификация",
    "tplContent"         => $tplContent,
    "categorys"          => $categorys,
    "cls_main_container" => '' // Перепишим класс у контейнера main
]);

print ($mainContent);
