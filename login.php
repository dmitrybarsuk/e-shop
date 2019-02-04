<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Вход - Black&White Shop</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/header-menu2.css" rel="stylesheet">

</head>
<body>
<div id="site">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
    echo ('<h1 align="center">Вход</h1>'); ?>
<form action="login_user.php" method="post">
<div class="main">
    <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
    <div class="field"> <p>
       <label>Ваш логин:<br></label>
        <input name="login" type="text" size="16" maxlength="16">
    </p></div>
    <p>
    <div class="field"> <label>Ваш пароль:<br></label>
        <input name="password" type="password"  maxlength="30">
    </p>
    <p>
        <input type="submit" name="submit" value="Войти">
        <br>
        <a href="/registration.php">Зарегистрироваться</a>
    </p>
</div></form>
<!--<a class="close"title="Закрыть" href="#close"></a> -->
