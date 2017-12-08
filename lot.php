<?php

require_once 'data.php';
require_once 'data_lots.php';
require_once 'functions.php';

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];


/**
 * Функция возвращает время сделанной ставки
 *
 * @param ts - время сделанной ставки в миллисикундаж
 * @return - время в человеческом виде
 *
 * */
function getDateof ($ts)
{
    $res = strtotime('now') - $ts;

    if ($res > 86400)
    {
        $res =  date("d.m.y в H:i", $ts);
    }
    elseif ($res >= 3600 && $res < 86400)
    {
        $res =  $res / 3600 . " часов назад";
    }
    elseif ($res < 3600)
    {
        $res =  $res / 60 . " минут назад";
    }

    return $res;
}
$mainContent = '';
if( array_key_exists($_GET["lot_num"], $lots)  )
{
    $tplContent = getTplContent('lot.php',[
        "categorys" => $categorys,
        "lots"      => $lots[$_GET["lot_num"]],
        "bets"      => $bets
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
