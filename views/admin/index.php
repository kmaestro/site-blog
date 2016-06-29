<div id="center">
<a href="/admin/add">Добавить статью</a>
    <table class="admin">
            <?php foreach ($post as $value):?>
            <tr>
                <td class="td1"><?=$value['title']?></td>
                <td class="td2"><a href="/admin/edit/<?=$value['id']?>">редоктировать</a></td>
                <td class="td3" ><a href="/admin/delete/<?=$value['id']?>">удалить</a></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php if ($nav != 1):?>
        <?php for($i = 1; $nav >= $i; $i++):?>
            <a href="<?=SITE_NAME.$link."/&nav=".$i?>"><?=$i?></a>
        <?php endfor;?>
    <?php endif;?>

</div>