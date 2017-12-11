<?php

/**
 * Функция возвращает содержимое шаблона
 * @param  string $tpl_name - имя шаблона
 * @param  array $data - Данные передаваемые в шаблон
 * @return string - Контент страницы в html
 *
 * */
function getTplContent ($tpl_name = "", $data)
{

    $tpl_path = "templates/" . $tpl_name;

    if (file_exists($tpl_path))
    {
        ob_start();
        require_once $tpl_path;

        $tplContent = ob_get_clean();
    }

    return $tplContent;
}

/**
 * Функция возвращает время сделанной ставки
 *
 * @param ts - время сделанной ставки в миллисикундаж
 * @return - время в человеческом виде
 *
 * */
function getDateOf ($ts)
{
    $res = strtotime('now') - $ts;

    if ($res > 86400)
    {
        $res =  date("d.m.y в H:i", $ts);
    }
    elseif ($res >= 3600 && $res < 86400)
    {
        $res = number_format((int)$res / 3600, 0, '.','') . " часов назад";
    }
    elseif ($res < 3600)
    {
        $res = number_format((int)$res / 60, 0, '.','') . " минут назад";
    }

    return $res;
}


/**
 * Функция проверяет, сделана ли ставка по выбраному лоту
 *
 * @param array $rates - массив сделанных ставок
 *
 * @param string $id - индекс текущего лота
 *
 * @return bool - возвращает true/false
 *
 **/

function getStatusRate($rates, $id)
{
    $has_rate = false;


    if(isset($rates['rate'.$id]))
    {
        $has_rate = true;
    }

    return $has_rate;
}
