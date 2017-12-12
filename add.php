<?php
session_start();
require_once 'data.php';
require_once 'functions.php';

if(isset($_SESSION['user']))
{
    $data = [];

    if ($_POST)
    {
        $form_fields = ['lot-name','category','message','lot-rate','lot-step','lot-date'];
        $form_fields_error = [];



        foreach ($_POST as $k => $v)
        {
            if (
                in_array($k, $form_fields)
                && empty(trim($v)) && $k != 'lot-rate'
                || $v == 'Выберите категорию'
                || ( $k == 'lot-rate' || $k == 'lot-step') && ( empty(trim($v)) || (int)$v < 0 )
            )
            {
                $form_fields_error[] = $k;
            }
        }


        if(empty($_FILES['image']['name']))
        {
            $form_fields_error[] = 'image';
        }
        else {
            $path_img   = $_FILES['image']['tmp_name'];
            $name_img   = $_FILES['image']['name'];
            $type_img   = $_FILES['image']['type'];
            $size_img   = $_FILES['image']['size'];
            $finfo      = finfo_open(FILEINFO_MIME_TYPE);
            $finfo_type = finfo_file($finfo, $path_img);

            if (
                $finfo_type == "image/png"
                || $finfo_type == "image/jpeg"
                || $finfo_type == "image/gif"
            )
            {
                if( !move_uploaded_file($path_img, $_SERVER['DOCUMENT_ROOT']. "/img/uploads/" .  $name_img) )
                {
                    var_dump('Ошиба в перемещении файлаааа!!!!');
                }
                $_POST['path_img'] = "img/uploads/" .  $name_img;
            }
            else
            {
                $form_fields_error[] = 'image';
            }
        }

        $data += ['form_fields' => $form_fields, 'form_fields_error' => $form_fields_error];
    }


    $data += [
        "categorys" => $categorys,
        "bets"      => $bets
    ];


    if( !isset($data['form_fields_error']) ||  !empty($data['form_fields_error']))
    {
        $tplName = 'add-lot.php';
    }
    else
    {
        $tplName = 'new-lot.php';
    }

    $tplContent = getTplContent($tplName, $data);
}
else
{
    http_response_code(403);
    die('403');
}

$mainContent = getTplContent('layout.php', [
    "title"              => "Добавление лота",
    "tplContent"         => $tplContent,
    "categorys"          => $categorys,
    "cls_main_container" => '' // Перепишим класс у контейнера main

]);
print ($mainContent);
