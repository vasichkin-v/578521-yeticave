<?php

require_once 'data.php';
require_once 'data_lot.php';
require_once 'functions.php';



if ($_POST && !empty($_POST['cost']) ) //Проверим, выполнена ли передача методом post
{
    if( isset($_POST['lot_id']) ) // Проверем, есть ли переменная lot_num
    {
        if( (int)$lot[ (int)$_POST['lot_id'] ]['price'] <= (int)$_POST['cost']) //Проверим, больше или равна цена ставки чем "Текущая цена" товара
        {
            if( isset($_COOKIE['my_rates']) ) //Есил уже есть добавленные ставки
            {
                $rate_val = unserialize($_COOKIE['my_rates']);
                $rate_val['rate' . $_POST['lot_id']] = [
                    'price' => $_POST['cost'],
                    'date'  => strtotime('now'),
                    'id'    => $_POST['lot_id']
                ];
                if(isset($rate_val['rate' . $_POST['lot_id']])) // Если стаква по этому лоту уже была сделана, то значение переписываться не будет(тем самым исключаем возможность повышения ставки)
                {
                    $not_set_cookie = true;
                }
            }
            else
            {
                $rate_val['rate' . $_POST['lot_id']] = [
                    'price' => $_POST['cost'],
                    'date'  => strtotime('now'),
                    'id'    => $_POST['lot_id']
                ];
            }

            $rate_name = 'my_rates' ;
            $rate_date = strtotime('+14 days');
            $rate_path = '/';

            if(!$not_set_cookie)
            {
                setcookie($rate_name, serialize($rate_val), $rate_date, $rate_path);
            }
        }
        else
        {
            echo "Цена ставки меньше минимальной"; // Если ставка меньше минимально цены
        }
    }

}


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
