<div id="center">
    <article>
        <?php foreach ($post as $value):?>
            <section>
                <h1><?=$value['title']?></h1>
                <img src="<?=IMG . $value['img']?>" alt="<?=$value['title']?>" width="200">
                <p>
                    <h3>Ингредиенты</h3>
               <?=$value['ingredients']?>                </p>
                <hr>
                <p>
                    <h3>Приготовление</h3>
               <?=$value['content']?>
                </p>



                <hr>
                <span style="font-size: 20px"><b>Приятного аппетита!</b></span>
            </section>
        <?php endforeach;?>

    </article>
</div>