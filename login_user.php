<!-- Обраюботчик входа-->
<?php
session_start();
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
}
if (empty($login) or empty($password)) {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$login = trim($login);
$password = trim($password);
$password = md5($password);
include("bd.php");

$sql_u = "SELECT * FROM Users WHERE login='$login'";
$result = mysqli_query($db, $sql_u) or trigger_error(mysqli_error() . " in " . $sql_u);
$myrow = mysqli_fetch_array($result);
if (empty($myrow['password'])) {
    exit ("Извините, введённый вами login или пароль неверный.");
} else {
    if ($myrow['password'] == $password) { //TODO: Сделать md5 хэширование
        $_SESSION['login'] = $myrow['login'];
        $_SESSION['idUsers'] = $myrow['idUsers'];
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>");
    } else {
        //если пароли не сошлись

        exit ("Извините, введённый вами login или пароль неверный.");
    }
}
?>