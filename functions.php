<?

/*
 * Функция возвращает содержимое шаблона
 *
 * @param string $tpl_name - имя шаблона
 *
 * @param array $data - Данные передаваемые в шаблон
 *
 * @return string - Контент страницы в html
 *
 * */
function getTplContent ($tpl_name, $data) {

    $tpl_path = "templates/" . $tpl_name . ".php";

    if (file_exists($tpl_path))
    {
        extract($data);
        ob_start();
        require_once $tpl_path;

        $tplContent = ob_get_clean();
    }
    else
    {
        $tplContent = "404";
    }
    return $tplContent;
}