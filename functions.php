<?php

/**
 * Функция возвращает содержимое шаблона
 * @param  string $tpl_name - имя шаблона
 * @param  array $data - Данные передаваемые в шаблон
 * @return string - Контент страницы в html
 *
 * */
function getTplContent ($tpl_name = "", $data) {


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
        $res =  $res / 3600 . " часов назад";
    }
    elseif ($res < 3600)
    {
        $res =  $res / 60 . " минут назад";
    }

    return $res;
}
