<?

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

//Массив с лотами
$lots = [
    [
        "title" => "2014 Rossignol District Snowboard",
        "category" => "Доски и лыжи",
        "price" => "10999",
        "url_img" => "img/lot-1.jpg",
        "url" => "lot.html",
        "time" => $lot_time_remaining
    ],
    [
        "title" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "Доски и лыжи",
        "price" => "159999",
        "url_img" => "img/lot-2.jpg",
        "url" => "lot.html",
        "time" => $lot_time_remaining
    ],
    [
        "title" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => "Крепления",
        "price" => "8000",
        "url_img" => "img/lot-3.jpg",
        "url" => "lot.html",
        "time" => $lot_time_remaining
    ],
    [
        "title" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "Ботинки",
        "price" => "10999",
        "url_img" => "img/lot-4.jpg",
        "url" => "lot.html",
        "time" => $lot_time_remaining
    ],
    [
        "title" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "Одежда",
        "price" => "7500",
        "url_img" => "img/lot-5.jpg",
        "url" => "lot.html",
        "time" => $lot_time_remaining
    ],
    [
        "title" => "Маска Oakley Canopy",
        "category" => "Разное",
        "price" => "5400",
        "url_img" => "img/lot-6.jpg",
        "url" => "lot.html",
        "time" => $lot_time_remaining
    ]
];