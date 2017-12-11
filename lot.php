<?php

require_once 'data.php';
require_once 'data_lot.php';
require_once 'functions.php';


$mainContent = '';
if( array_key_exists($_GET["lot_num"], $lot)  )
{
    $tplContent = getTplContent('lot.php',[
        "categorys" => $categorys,
        "lot"       => $lot[$_GET["lot_num"]],
        "bets"      => $bets,
        "my_rates"  => !empty($_COOKIE['my_rates']) ? unserialize($_COOKIE['my_rates']):'',
    ]);

    $mainContent = getTplContent('layout.php', [
        "title"              => "DC Ply Mens 2016/2017 Snowboard",
        "is_auth"            => $is_auth,
        "user_avatar"        => $user_avatar,
        "user_name"          => $user_name,
        "tplContent"         => $tplContent,
        "categorys"          => $categorys,
        "cls_main_container" => '' // Перепишим класс у контейнера main
    ]);

}
else {
    $mainContent = getTplContent('404.php', []);
}
print ($mainContent);
