<nav class="nav">
    <ul class="nav__list container">
        <?php foreach($data['categorys'] as $item):?>
        <li class="nav__item">
            <a href="<?=$item['url']?>"><?=$item['title']?></a>
        </li>
        <?php endforeach;?>
    </ul>
</nav>
<form class="form form--add-lot container<?= !empty($data['form_fields_error'])?' form--invalid':''?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item<?= (!empty($data['form_fields_error']) && in_array('lot-name', $data['form_fields_error']))?' form__item--invalid':''?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= !empty($_POST['lot-name']) ? htmlspecialchars($_POST['lot-name']):''?>">
            <span class="form__error">Введите наименование лота</span>
        </div>
        <div class="form__item <?= (!empty( $data['form_fields_error']) && in_array('category', $data['form_fields_error']))?' form__item--invalid':''?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <option>Выберите категорию</option>
                <?php foreach($data['categorys']  as $item):?>
                    <?php if( !empty($_POST['category']) && $item['title'] == $_POST['category'] ) :?>
                        <option selected><?=$item['title']?></option>
                    <?php else:?>
                        <option><?=$item['title']?></option>
                    <?php endif?>
                <?php endforeach;?>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <div class="form__item form__item--wide<?= ( !empty($data['form_fields_error']) && in_array('message', $data['form_fields_error']) )?' form__item--invalid':''?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?= !empty($_POST['message']) ? htmlspecialchars($_POST['message']):''?></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file<?= ( !empty($data['form_fields_error']) && in_array('image', $data['form_fields_error']) )?' form__item--uploaded':''?>"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="<?= isset($_POST['path_img']) ? $_POST['path_img']:''?>" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" name="image" value="<?= !empty($_FILES['image']) ? htmlspecialchars($_FILES['image']["name"]):''?>" style="width:auto;">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small<?= ( !empty($data['form_fields_error']) && in_array('lot-rate', $data['form_fields_error']) )?' form__item--invalid':''?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= !empty($_POST['lot-rate']) ? htmlspecialchars($_POST['lot-rate']):''?>">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item form__item--small<?= ( !empty($data['form_fields_error']) && in_array('lot-step', $data['form_fields_error']) )?' form__item--invalid':''?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= !empty($_POST['lot-step'])? htmlspecialchars($_POST['lot-step']):''?>">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item<?= ( !empty($data['form_fields_error']) && in_array('lot-date', $data['form_fields_error']) )?' form__item--invalid':''?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= !empty($_POST['lot-date']) ? htmlspecialchars($_POST['lot-date']):''?>">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>
