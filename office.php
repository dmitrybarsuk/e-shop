<!-- Изменение информации пользователем -->
<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет - Black&White Shop</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/header-menu2.css" rel="stylesheet">

</head>
<body>
<div id="site">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
    echo('<h1 align="center">Личный кабинет</h1>');
    if (empty($_SESSION['login'])) {
        header("Location:login.php");
    } else {
        include("db_connection.php");
        $login = $_SESSION['login'];
        $query = "SELECT firstname, secondname, phone, email, adress, BirthDay, registrationDate FROM Users WHERE login='$login'";
        $result = mysqli_query($db, $query) or trigger_error(mysqli_error() . " in " . $query);
        $myrow = mysqli_fetch_array($result);
        ?>
        <div class="aboutme">
            <p><b>Логин:</b> <?php echo("$_SESSION[login]"); ?> </p>
            <p><b>Имя:</b> <?php echo($myrow['firstname']); ?></p>
            <p><b>Фамилия:</b> <?php echo($myrow['secondname']); ?></p>
            <p><b>E-mail:</b> <?php echo($myrow['email']); ?></p>
            <p><b>Телефон:</b> <?php echo($myrow['phone']); ?></p>
            <p><b>Адресс:</b> <?php echo($myrow['adress']); ?></p>
            <p><b>День рождения:</b> <?php echo($myrow['BirthDay']); ?></p>
            <p><b>Дата регистрации:</b> <?php echo($myrow['registrationDate']); ?></p>
        </div>

        <form action="office.php" method="post">
            <div class="main" id="changeinfo">
                <h3 style="text-align: center">Изменить информацию</h3>
                <div class="field"><p><span><label for="fn1">Имя:</label></span>
                        <input id="fn1" name="firstname" type="text" maxlength="20">
                    </p></div>
                <div class="field"><p><span><label for="ln1">Фамилия:</label></span>
                        <input id="ln1" name="lastname" type="text" maxlength="25">
                    </p></div>
                <div class="field"><p><span><label for="e-mail1">E-mail:</label></span>
                        <input id="e-mail1" name="email" type="email" maxlength="50">
                    </p></div>

                <div class="field"><p><span><label for="tphone1">Телефон:</label></span>
                        <input id="tphone1" name="phone" type="tel" placeholder="095 555 55 55">
                    </p></div>
                <div class="field"><p><span><label for="addr1">Адресс:</label></span>
                        <input id="addr1" name="adress" type="text" maxlength="40">
                    </p></div>
                <div class="field"><p><span><label for="bday1">День Рождения:</label></span>
                        <input id="bday1" name="birthday" type="date" min="1920-01-01" max="2017-01-01">
                    </p></div>
                <div><p>
                        <input name="submit" type="submit" value="Изменить информацию">
                    </p></div>
            </div>
        </form>
        <?php
        if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
            $fname = $_POST['firstname'];
            mysqli_query($db, "UPDATE Users SET firstname = '$fname' WHERE login = '$login'"); //or trigger_error(mysqli_error() . " in " . "UPDATE Users SET firstname = '$fname' WHERE login = '$login'");
        } else {
        }
        if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
            $lname = $_POST['lastname'];
            mysqli_query($db, "UPDATE Users SET secondname = '$lname' WHERE login = '$login'"); //or trigger_error(mysqli_error() . " in " . "UPDATE Users SET lastname = '$lname' WHERE login = '$login'");
        } else {
        }
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = $_POST['email'];
            mysqli_query($db, "UPDATE Users SET email = '$email' WHERE login = '$login'"); //or trigger_error(mysqli_error() . " in " . "UPDATE Users SET email = '$email' WHERE login = '$login'");
        } else {
        }
        if (isset($_POST['phone']) && !empty($_POST['phone'])) {
            $phone = $_POST['phone'];
            mysqli_query($db, "UPDATE Users SET phone = '$phone' WHERE login = '$login'"); //or trigger_error(mysqli_error() . " in " . "UPDATE Users SET phone = '$phone' WHERE login = '$login'");
        } else {
        }
        if (isset($_POST['adress']) && !empty($_POST['adress'])) {
            $adr = $_POST['adress'];
            mysqli_query($db, "UPDATE Users SET adress = '$adr' WHERE login = '$login'"); //or trigger_error(mysqli_error() . " in " . "UPDATE Users SET adress = '$adr' WHERE login = '$login'");
        } else {
        }
        if (isset($_POST['birthday']) && !empty($_POST['birthday'])) {
            $day = $_POST['birthday'];
            mysqli_query($db, "UPDATE Users SET BirthDay = '$day' WHERE login = '$login'"); //or trigger_error(mysqli_error() . " in " . "UPDATE Users SET BirthDay = '$day' WHERE login = '$login'");
        } else {
        }
        if (isset($_POST["submit"])) {
            header("Refresh:0;");
        }
        ?>
    <?php } ?>
</div>

</body>
</html>
