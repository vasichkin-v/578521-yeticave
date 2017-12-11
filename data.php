<?php

$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = strtotime('now');

// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
$lot_time_remaining = gmdate("H:i", $tomorrow - $now);

// Массив с категориями
$categorys = [
    [
        "title" => "Доски и лыжи",
        "class" => "boards",
        "url" => "all-lots.html"
    ],
    [
        "title" => "Крепления",
        "class" => "attachment",
        "url" => "all-lots.html"
    ],
    [
        "title" => "Ботинки",
        "class" => "boots",
        "url" => "all-lots.html"
    ],
    [
        "title" => "Одежда",
        "class" => "clothing",
        "url" => "all-lots.html"
    ],
    [
        "title" => "Инструменты",
        "class" => "tools",
        "url" => "all-lots.html"
    ],
    [
        "title" => "Разное",
        "class" => "other",
        "url" => "all-lots.html"
    ]
];

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];