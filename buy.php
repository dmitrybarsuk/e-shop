<!-- Обраюботчик покупки -->
<?php
session_start();
include("db_connection.php");

if(isset($_POST['idProd'])){
$id = (int)$_POST['idProd'];
}
if(isset($_POST['count'])){
$count = (int)$_POST['count'];
}
if(isset($_POST['price'])){
    $cost = $count * (int)$_POST['price'];
}
if(isset($_POST['storage'])) {
    $storage = (int)$_POST['storage'];
    if ($storage > $count or $storage == $count) {
        $query = "INSERT INTO Orders(idUsers,idProducts,Cost,NumberOfProd) VALUES ('$_SESSION[idUsers]','$id','$cost','$count')";
        $result = mysqli_query($db,$query) or trigger_error(mysqli_error($db)." in ". $query);
    } else exit("Покупка не удалась, не хватает товара на складе!");
}

if($result == "TRUE"){
    echo("Покупка успешна! Вы будете перенаправлены!");
    exit("<html><head><meta http-equiv='Refresh' content='3;    URL=index.php'></head></html>");

}else exit("Не удалось совершить покупку!")
?>