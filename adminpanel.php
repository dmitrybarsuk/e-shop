<?php
////  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Админ-панель - Black&White Shop</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/header-menu2.css" rel="stylesheet">

</head>
<body>
<div id="site">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
    include("bd.php");
    if (!empty($_SESSION['login']) && $_SESSION['login'] == "admin") {
        ?>
        <div class="admin">
            <ul class="hidediv">
                <li>
                    <div class="spoiler">
                        <label for="hidecheck">Добавить товар</label>
                        <input type="checkbox" id="hidecheck">
                        <div class="showusers">
                            <div id="admdiv" class="main">
                                <form action="addcategory.php" method="post" enctype="multipart/form-data">
                                    <div class="field"><p><label for="prodname">Название товара*: </label>
                                            <input id="prodname" name="name" type="text"></p></div>
                                    <div class="field"><p><label for="priceid">Цена*: </label>
                                            <input id="priceid" name="price" type="number"></p></div>
                                    <div class="field"><p><label for="categid">Категория*: </label>
                                            <input id="categid" name="category" type="text"></p></div>
                                    <div class="field"><p><label for="scat">Подкатегория*: </label>
                                            <input id="scat" name="subcategory" type="text"></p></div>
                                    <div class="field"><p><label for="count">Количество на складе*: </label>
                                            <input id="count" name="storage" type="number"></p></div>
                                    <div class="field"><p><label for="artc">Артикуль*: </label>
                                            <input id="artc" name="articul" type="text"> </p></div>
                                    <div class="field">   <p><label>Поставщик*:</label> <Br>
                                            <input type="radio" id="prov" name="idProviders" value=1> Clean<Br>
                                            <input type="radio" id="prov" name="idProviders" value=2> Apple<Br>
                                        </p></div>
                                    <div class="field"><p><label for="opis">Описание*: </label>
                                            <input class="text" id="opis" name="description" type="text"> </p></div>
                                    <div class="field"><p><label for="ves">Вес: </label>
                                            <input id="ves" name="weight" type="number"></p></div>
                                    <div class="field"><p><label for="vusota">Высота: </label>
                                            <input id="vusota" name="height" type="number"></p></div>
                                    <div class="field"><p><label for="dlina">Длинна: </label>
                                            <input id="dlina" name="length" type="number"></p></div>
                                    <div class="field"><p><label for="shirina">Ширина: </label>
                                            <input id="shirina" name="width" type="number"></p></div>
                                   <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                                    <div class="field"<p><label for="imgfile">Изображение:</label></p>
                                    <input type="file" id="imgfile" name="image" multiple accept="image/*" />
                                    <div><p><input name="submit" type="submit" value="Добавить товар">
                                        </p></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <li></li>
            </ul>
        </div>

    <?php } else {
        header("Location: index.php");
    } ?>
</div>

</body>
</html>
