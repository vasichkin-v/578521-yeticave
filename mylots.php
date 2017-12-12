<?php

require_once 'data.php';
require_once 'data_lot.php';
require_once 'functions.php';


$mainContent = '';
$tplContent = getTplContent('mylots.php',[
    "categorys" => $categorys,
    "my_rates"  => isset($_COOKIE['my_rates']) ? unserialize($_COOKIE['my_rates']):'',
    'lot'       => $lot
]);

$mainContent = getTplContent('layout.php', [
    "title"              => "Мои ставки",
    "is_auth"            => $is_auth,
    "user_avatar"        => $user_avatar,
    "user_name"          => $user_name,
    "tplContent"         => $tplContent,
    "categorys"          => $categorys,
    "cls_main_container" => '' // Перепишим класс у контейнера main
]);

print ($mainContent);
