<div id="center">
    <form class="add" action="" method="post" >
        <label>Изображение: <input type="text" name="title"></label><br>
        <label>Заголовок: <input type="text" name="title"></label><br>
        <label>Описание:<br><textarea name="content" cols="50" rows="10"></textarea><br>
            <label>Ингредиенты:<br><textarea name="content" cols="50" rows="10"></textarea><br>
                <label>Приготовление:<br><textarea name="content" cols="50" rows="10"></textarea><br>
                    <label>Категории:<br><select>
                            <?php foreach ($menu as $value):?>
                                <option><?=$value['name'];?></option>
                            <?php endforeach;?>
                        </select><br>
                    <br>
                    <input type="submit" name="submit">
    </form>
</div>