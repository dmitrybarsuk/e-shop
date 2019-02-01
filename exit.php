<?php
session_start();
if    (empty($_SESSION['login']) or empty($_SESSION['idUsers']))
{
    //если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение    об ошибке, останавливаем скрипт
    exit ("Доступ на эту    страницу разрешен только зарегистрированным пользователям. Если вы    зарегистрированы, то войдите на сайт под своим логином и паролем<br><a    href='index.php'>Главная    страница</a>");
}

unset($_SESSION['password']);
unset($_SESSION['login']);
unset($_SESSION['idUsers']);//    уничтожаем переменные в сессиях
session_destroy();
exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
// отправляем пользователя на главную страницу.
?>