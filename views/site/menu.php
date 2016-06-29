<div id="left">
    <h2>Статьи</h2>
    <nav>
        <ul>
            <?php foreach ($post as $value):?>
            <li>
                <a href="/page/category/<?=$value['id']?>"><?=$value['name']?></a>
            </li>
           <?php endforeach;?>
        </ul>
    </nav>
</div>