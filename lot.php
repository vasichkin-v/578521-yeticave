<?php

require_once 'data.php';
require_once 'data_lot.php';
require_once 'functions.php';


if ($_POST && !empty($_POST['cost']) ) //Проверим, выполнена ли передача методом post
{
    if( isset($_GET["lot_num"]) ) // Проверем, есть ли переменная lot_num
    {
        if( (int)$lot[ (int)$_GET["lot_num"] ]['price'] <= (int)$_POST['cost']) //Проверим, больше или равна цена ставки чем "Текущая цена" товара
        {
            if( isset($_COOKIE['my_rates']) ) //Есил уже есть добавленные ставки
            {
                $rate_val = unserialize($_COOKIE['my_rates']);

                if(!isset($rate_val['rate' . $_GET["lot_num"]])) // Если стаква по этому лоту уже была сделана, то значение переписываться не будет(тем самым исключаем возможность повышения ставки)
                {
                    $rate_val['rate' . $_GET["lot_num"]] = [
                        'price' => $_POST['cost'],
                        'date'  => strtotime('now'),
                        'id'    => $_GET["lot_num"]
                    ];
                }
                else
                {
                    $not_set_cookie = true;
                }
            }
            else
            {
                $rate_val['rate' . $_GET["lot_num"]] = [
                    'price' => $_POST['cost'],
                    'date'  => strtotime('now'),
                    'id'    => $_GET["lot_num"]
                ];
            }

            $rate_name = 'my_rates' ;
            $rate_date = strtotime('+14 days');
            $rate_path = '/';


            if(!isset($not_set_cookie))
            {
                setcookie($rate_name, serialize($rate_val), $rate_date, $rate_path);
                header('Location: /mylots.php');
            }
        }
        else
        {
            echo "Цена ставки меньше минимальной"; // Если ставка меньше минимально цены
            die();
        }
    }

}


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
        "title"              => $lot[$_GET["lot_num"]]['title'],
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
