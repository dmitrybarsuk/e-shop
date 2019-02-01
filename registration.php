<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Регистрация - Black&White Shop</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/header-menu2.css" rel="stylesheet">

</head>
<body>
<div id="site">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
    echo ('<h1 align="center">Регистрация</h1>');
    if(!empty($_SESSION['login']))
    {
        echo("Вы уже зарегистрированы!");
    }
    else{
    ?>
        <form action="http://localhost:63342/e-shop/save_user.php" method="post">
            <div class ="main">
                <div class="field"><label for="log">Ваш логин:</label>
                    <input class="login" id="log" name="login" type="text" size="16" maxlength="16">
                </div>
                <div class="field"><p><label for="pass">Ваш пароль:</label>
                        <input id ="pass" name="password" type="password" maxlength="30">
                    </p></div>
                <div class="field"><p><label for="e-mail">E-mail:</label>
                        <input id="e-mail" name="email" type="email" maxlength="50">
                    </p></div>
                <div class="field"><p><label for="fn">Имя:</label>
                        <input id="fn" name="firstname" type="text" maxlength="20">
                    </p></div>
                <div class="field"><p><label for="ln">Фамилия:</label>
                        <input id="ln" name="lastname" type="text" maxlength="25">
                    </p></div>
                <div class="field"><p><label for="tphone">Ваш телефон:</label>
                        <input id="tphone" name="phone" type="tel" placeholder="095 555 55 55">
                    </p></div>
                <div class="field"><p><label for="addr">Ваш адресс:</label>
                        <input id="addr" name="adress" type="text" maxlength="40">
                    </p></div>
                <div class="field"><p><label for="rad1">Ваш пол:</label>
                        <input id="rad1" name="gender" type="radio" value="М">Мужской
                        <input  name="gender" type="radio" value="Ж">Женский
                    </p></div>
                <div class="field"><p><label for="bday">День Рождения:</label>
                        <input id="bday" name="birthday" type="date" min="1920-01-01" max="2017-01-01">
                    </p></div>
                <div><p>
                        <input name="submit" type="submit" value="Зарегистрироваться">
                    </p></div>
            </div>
        </form>

    <?php } ?>

</div>
</body>
</html>