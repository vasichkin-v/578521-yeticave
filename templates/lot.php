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
    <h2><?=$data['lot']['title']?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?=$data['lot']['url_img']?>" width="730" height="548" alt="Сноуборд">
            </div>
            <p class="lot-item__category">Категория: <span><?=$data['lot']['category']?></span></p>
            <p class="lot-item__description"><?=$data['lot']['desc']?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    <?=$data['lot']['time']?>
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?=$data['lot']['price']?> р</span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?=$data['lot']['price']?> р</span>
                    </div>
                </div>
                <?php if (!getStatusRate($data['my_rates'], $_GET['lot_num'])):?>
                    <form class="lot-item__form" action="/mylots.php" method="post">
                        <input type="hidden" name="lot_id" value="<?=isset($_GET['lot_num'])?$_GET['lot_num']:''?>">
                        <p class="lot-item__form-item">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="cost" placeholder="<?=$data['lot']['price'] + 1000?> р">
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                <?php endif;?>
            </div>
            <div class="history">
                <h3>История ставок (<span><?=count($data['bets'])?></span>)</h3>
                <!-- заполните эту таблицу данными из массива $bets-->
                <table class="history__list">
                    <?foreach ($data['bets'] as $v):?>
                        <tr class="history__item">
                            <td class="history__name"><?=$v["name"]?></td>
                            <td class="history__price"><?=$v["price"]?> р</td>
                            <td class="history__time"><?=getDateOf($v["ts"])?></td>
                        </tr>
                    <?endforeach;?>
                </table>
            </div>
        </div>
    </div>
</section>