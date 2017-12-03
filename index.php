<?php

require_once 'data.php';
require_once 'functions.php';

$tplContent = getTplContent('index.php',[
    "categorys" => $categorys,
    "lots"      => $lots
]);

$mainContent = getTplContent('layout.php', [
    "title"         => "YetiCave::Главная",
    "is_auth"       => $is_auth,
    "user_avatar"   => $user_avatar,
    "user_name"     => $user_name,
    "tplContent"    => $tplContent,
    "categorys" => $categorys
]);

print ($mainContent);