<!-- Обраюботчик поиска -->
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
    include("header.php");
    include("db_connection.php");
    if (isset($_GET['q'])) {
        $search_q = $_GET['q'];
        $search_q = trim($search_q);
        $search_q = strip_tags($search_q);
        $q = mysqli_query($db, "SELECT * FROM Products WHERE ProdName LIKE '%$search_q%'");
        echo "<div style='display: table'>";
        while ($myrow = mysqli_fetch_assoc($q)) {

            echo "<div style='display: table-row' class=\"prods\">
        <img style='text-align: center' src=\"image.php?id=$myrow[idProducts]\" alt=\"\"/> <br>
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
    }
    ?>
</div>
</body>
</html>