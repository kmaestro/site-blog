
<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="<?=SITE_NAME?>style/style.css">
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter37480635 = new Ya.Metrika({
                    id:37480635,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<!-- /Yandex.Metrika counter -->
</head>
<body>
<div id="content">
    <header>
        <h1><?=SITE_NAME_HEADER?></h1>
        <nav id="top">
            <ul>

                <li>
                    <a href="/">Главное</a>
                </li>


            </ul>
        </nav>
    </header>
    <?=$menu?>
    <?=$content?>
</div>
<footer>
    <p>Copyright &copy; <?=date("Y")?> Полищук Дмитрий Михайлович.
        <a href="http://yandex.ru/cy?base=0&amp;host=<?=SITE_NAME?>" style="float: right"><img src="http://www.yandex.ru/cycounter?мой_сайт" width="88" height="31" alt="Индекс цитирования" border="0" /></a>
        <br>
        cookingtasty123@gmail.com</p>



</footer>
</body>
</html>
