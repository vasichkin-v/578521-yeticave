<?php
/**
 * @var $data array - массив с данными которые выводятся в шаблоне (Список категорий и лоты)
 *
 * */
?>

<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?foreach ($data["categorys"] as $v):?>
                <li class="promo__item promo__item--<?=$v['class']?>">
                    <a class="promo__link" href="<?=$v['url']?>"><?=$v['title']?></a>
                </li>
            <?endforeach;?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <? foreach ($data["lots"] as $v):?>
                <li class="lots__item lot">

                    <div class="lot__image">
                        <img src="<?=$v["url_img"]?>" width="350" height="260" alt="<?=$v["category"]?>">
                    </div>

                    <div class="lot__info">
                        <span class="lot__category"><?=$v["category"]?></span>
                        <h3 class="lot__title"><a class="text-link" href="<?=$v['url']?>"><?=htmlspecialchars($v["title"])?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?=htmlspecialchars($v["price"])?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=$v["time"]?>
                            </div>
                        </div>
                    </div>
                </li>
            <?endforeach;?>
        </ul>
    </section>
</main>