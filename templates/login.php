<nav class="nav">
    <ul class="nav__list container">
        <?php foreach($data['categorys'] as $item):?>
            <li class="nav__item">
                <a href="<?=$item['url']?>"><?=$item['title']?></a>
            </li>
        <?php endforeach;?>
    </ul>
</nav>
<form class="form container<?= ($_POST && !isset($_SESSION['user']) )?' form--invalid':''?>" action="" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item<?= ($_POST && !isset($_SESSION['user']) )?' form__item--invalid':''?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= !empty($_POST['email']) ? htmlspecialchars($_POST['email']):''?>" requiredf>
        <span class="form__error">Введите e-mail</span>
    </div>
    <div class="form__item form__item--last<?= ($_POST && !isset($_SESSION['user']) )?' form__item--invalid':''?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?= !empty($_POST['password']) ? htmlspecialchars($_POST['password']):''?>" requiredf>
        <span class="form__error">Введите пароль</span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>