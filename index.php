<!--Главная страница -->
<?php
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
    $query = "SELECT * FROM Products";

    $result = mysqli_query($db, $query) or trigger_error(mysqli_error() . " in " . $query);
    $myrow = mysqli_fetch_assoc($result);
    echo "<div>";
    while ($myrow = mysqli_fetch_assoc($result)) {

        echo "<div class=\"prods\">
        <img src=\"image.php?id=$myrow[idProducts]\" alt=\"\"/> <br>
        Название: $myrow[ProdName] <br>
        Цена: $myrow[Price]<br>
        Описание: <i> $myrow[description]</i>
        <form action=\"buy.php\" method=\"post\">
            <input type=\"hidden\" name=\"idProd\"   value=\"$myrow[idProducts]\" />
            <input type=\"hidden\" name=\"storage\"   value=\" $myrow[storage]\" />
            <input type=\"hidden\" name=\"price\"   value=\" $myrow[Price]\" />
            <label>Количество:
                <input type=\"text\" name=\"count\"></label><br>
            <br>
            <input type=\"submit\" name=\"submit\" value=\"Купить\">
        </form>
    </div>";
    }
    echo "</div>";
    ?>

</div>
</body>
</html>