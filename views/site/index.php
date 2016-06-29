<div id="center">
    
        <?php foreach ($post as $value):?>
            <h3><a href="/page/article/<?=$value['id']?>"><?=$value['title'];?></a></h3>
            <img class="index" src="<?=IMG . $value['img']?>" alt="<?=$value['title']?>">

            <hr>
        <?php endforeach;?>


    <?php if ($nav != 1):?>
    <?php for($i = 1; $nav >= $i; $i++):?>
        <a href="<?=SITE_NAME.$link."/&nav=".$i?>"><?=$i?></a>
    <?php endfor;?>
    <?php endif;?>


</div>
