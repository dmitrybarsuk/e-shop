
<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Black&White Shop</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/header-menu2.css" rel="stylesheet">

</head>
<body>
<div id="site">
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
    include("db_connection.php");
    $idProd = 23;
    $query = "SELECT * FROM Products WHERE idProducts = '$idProd' ";
    $result = mysqli_query($db, $query) or trigger_error(mysqli_error() . " in " . $query);;
    $myrow = mysqli_fetch_array($result);
    ?>
    <div class="prods">
        <img src="image.php?id=<?=$idProd?>" alt=""/> <br>
        Название: <?= $myrow['ProdName']; ?> <br>
        Цена: <?= $myrow['Price'] ?><br>
        Описание: <i> <?=$myrow['description'] ?></i>
        <form action="buy.php" method="post">  <!-- сделаем кнопку при помощи которой можно покупать  -->
            <input type="hidden" name="idProd"   value="<?= $myrow["idProducts"]; ?>" />
            <input type="hidden" name="storage"   value="<?= $myrow["storage"]; ?>" />
            <input type="hidden" name="price"   value="<?= $myrow['Price']; ?>" />
            <label>Количество:
                <input type="text" name="count"></label><br>
            <br>
            <?php if(isset($_SESSION['login'])){
                echo('<input type="submit" name="submit" value="Купить">');
            } else echo "Для покупки авторизируйтесь"; ?>
        </form>

    </div>
</body>
</html>

