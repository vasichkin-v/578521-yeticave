<?php

/**
 * Функция возвращает содержимое шаблона
 * @param  string $tpl_name - имя шаблона
 * @param  array $data - Данные передаваемые в шаблон
 * @return string - Контент страницы в html
 *
 * */
function getTplContent ($tpl_name, $data) {

    $tplContent = "";

    $tpl_path = "templates/" . $tpl_name;

    if (file_exists($tpl_path))
    {
        $data;
        ob_start();
        require_once $tpl_path;

        $tplContent = ob_get_clean();
    }

    return $tplContent;
}