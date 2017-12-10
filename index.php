<?php

require_once 'data.php';
require_once 'data_lot.php';
require_once 'functions.php';

$tplContent = getTplContent('index.php',[
    "categorys" => $categorys,
    "lot"       => $lot
]);

$mainContent = getTplContent('layout.php', [
    "title"         => "YetiCave::Главная",
    "is_auth"       => $is_auth,
    "user_avatar"   => $user_avatar,
    "user_name"     => $user_name,
    "tplContent"    => $tplContent,
    "categorys"     => $categorys
]);

print ($mainContent);