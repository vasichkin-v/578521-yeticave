<nav class="nav">
    <ul class="nav__list container">
        <?php foreach($data['categorys'] as $item):?>
            <li class="nav__item">
                <a href="<?=$item['url']?>"><?=$item['title']?></a>
            </li>
        <?php endforeach;?>
    </ul>
</nav>
<section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
        <?php if(isset($data['my_rates']) && !empty($data['my_rates']) ):?>
            <?php foreach (array_reverse($data['my_rates'], true) as $k => $v):?>
                <tr class="rates__item">
                    <td class="rates__info">
                        <div class="rates__img">
                            <img src="<?php echo $data['lot'][$v['id']]['url_img']?>" width="54" height="40" alt="Сноуборд">
                        </div>
                        <h3 class="rates__title"><a href="<?php echo $data['lot'][$v['id']]['url']?>"><?php echo $data['lot'][$v['id']]['title']?></a></h3>
                    </td>
                    <td class="rates__category">
                        <?php echo $data['lot'][$v['id']]['category']?>
                    </td>
                    <td class="rates__timer">
    <!--                    <div class="timer timer--finishing">07:13:34</div>-->
                    </td>
                    <td class="rates__price">
                        <?= $v['price']?> p
                    </td>
                    <td class="rates__time">
                        <?= getDateOf($v['date'])?>
                    </td>
                </tr>

            <?php endforeach;?>
        <?php else:?>
        <p>У Вас нет ставок. <a href="/">Сделать ставку!</a></p>
        <?php endif;?>

    </table>
</section>