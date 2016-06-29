
<div id="center">
<form class="add" action="/admin/add" method="post" onsubmit="return save();" enctype="multipart/form-data">
    <label>Изображение:
        <br>
        <input type="file" name="img">
    </label>
    <br>
    <label>Заголовок:
        <br>
        <input type="text" name="title">
    </label>
    <br>
    <input type="hidden" name="deck" id="inputDeck" value=""><br>
    <br><input type="hidden" id="inputIng" name="ing" value=""><br>
        <input type="hidden"  id="inputContent" name="content" value=""><br>

    <label class="r">Описание:
        <br>
        <iframe id="deck" ></iframe>
    </label>
        <br>
    <label class="r">Ингредиенты:
        <br>
        <input type="button" onclick="onStyleIng('InsertUnorderedList')"  value="UL">
        <br>
        <iframe id="ing" ></iframe>
    </label>
        <br>
    <label class="r">Приготовление:
        <br>
        <input type="button" onclick="onStyleContent('InsertOrderedList');" value="OL">
        <br>
        <iframe id="content2" ></iframe>
    </label>
    <br>

    <label>Категории:<br><select name="k">
            <?php foreach ($menu as $value):?>
                <option value="<?=$value['id']?>"><?=$value['name'];?></option>
            <?php endforeach;?>
        </select><br></label>

        <br>
        <input type="submit" name="submit">
</form>


    <script type="text/javascript">
        var doc = document;
        var deck = doc.getElementById('deck').contentWindow.document.designMode = 'On';
        var ing = doc.getElementById('ing').contentWindow.document.designMode = 'On';
        var content = doc.getElementById('content2').contentWindow.document.designMode = 'On';


        function onStyleIng(style) {
            return doc.getElementById('ing').contentWindow.document.execCommand(style, false, null);
        }
        function onStyleDeck(style) {
            return doc.getElementById('deck').contentWindow.document.execCommand(style, false, null);
        }
        function onStyleContent(style) {
            return doc.getElementById('content2').contentWindow.document.execCommand(style, false, null);
        }

        function save() {
            document.getElementById('inputContent').value = document.getElementById('content2').contentDocument.body.innerHTML;
            document.getElementById('inputDeck').value = document.getElementById('deck').contentDocument.body.innerHTML;
            document.getElementById('inputIng').value = document.getElementById('ing').contentDocument.body.innerHTML;
            return true;

        }
    </script>
</div>
