<!-- Обраюботчик регистрации -->
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
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
} //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($email == '') {
        unset($email);
    }
}
if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
    if ($firstname == '') {
        unset($firstname);
    }
}
if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
    if ($lastname == '') {
        unset($lastname);
    }
}
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    if ($phone == '') {
        unset($phone);
    }
}
if (isset($_POST['adress'])) {
    $adress = $_POST['adress'];
    if ($adress == '') {
        unset($adress);
    }
}
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    if ($gender == '') {
        unset($gender);
    }
}
if (isset($_POST['birthday'])) {
    $birthday = $_POST['birthday'];
    if ($birthday == '') {
        unset($birthday);
    }
}

if (empty($login) or empty($password) or empty($email) or empty($firstname) or empty($lastname) or empty($phone) or empty($birthday)){ //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$email = stripslashes($email);
$email = htmlspecialchars($email);
$firstname = stripslashes($firstname);
$firstname = htmlspecialchars($firstname);
$lastname = stripslashes($lastname);
$lastname = htmlspecialchars($lastname);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$email = trim($email);
$firstname = trim($firstname);
$lastname = trim($lastname);
$password = md5($password);
// подключаемся к базе
include("db_connection.php");// файл db_connection.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя с таким же логином
$sql1 ="SELECT idUsers FROM Users WHERE login='$login'";
$sql2 = "INSERT INTO Users(login,password,email,firstname, secondname, phone, adress,gender,BirthDay) VALUES('$login','$password','$email','$firstname','$lastname','$phone','$adress','$gender','$birthday')";

$result = mysqli_query($db,$sql1) or trigger_error(mysqli_error()." in ". $sql1);
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['idUsers'])) {
    echo ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
// если такого нет, то сохраняем данные
$result2 = mysqli_query($db,$sql2) or trigger_error(mysqli_error($db)." in ". $sql2);
// Проверяем, есть ли ошибки
if ($result2 == 'TRUE') {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
} else {
    echo "Ошибка! Вы не зарегистрированы.";
}
?>
</div>
</body>
</html>
