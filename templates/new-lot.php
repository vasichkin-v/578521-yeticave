<?php

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

?>
<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach($data['categorys'] as $item):?>
                <li class="nav__item">
                    <a href="<?=$item['url']?>"><?=$item['title']?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2><?=$_POST['lot-name']?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?=htmlspecialchars($_POST['path_img'])?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=htmlspecialchars($_POST['category'])?></span></p>
                <p class="lot-item__description"><?=htmlspecialchars($_POST['message'])?></p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        10:54:12
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost"><?=htmlspecialchars($_POST['lot-rate'])?> p</span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span><?php echo htmlspecialchars((int)$_POST['lot-rate']) + htmlspecialchars((int)$_POST['lot-step'])?> р</span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
                        <p class="lot-item__form-item">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="cost" placeholder="<?php echo htmlspecialchars((int)$_POST['lot-rate']) + htmlspecialchars((int)$_POST['lot-step'])?>">
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
                <div class="history">
                    <h3>История ставок (<span>4</span>)</h3>
                    <!-- заполните эту таблицу данными из массива $bets-->
                    <table class="history__list">
                        <?foreach ($bets as $v):?>
                            <tr class="history__item">
                                <td class="history__name"><?=$v["name"]?></td>
                                <td class="history__price"><?=$v["price"]?> р</td>
                                <td class="history__time"><?=getDateof($v["ts"])?></td>
                            </tr>
                        <?endforeach;?>

                    </table>
                </div>
            </div>
        </div>
    </section>
</main>