<!-- Выборка картинки из бд -->
<?php
include("db_connection.php");
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($id > 0) {
        $query = "SELECT `picture` FROM `Pictures` WHERE `idProducts`= '$id'";
        // Выполняем запрос и получаем файл
        $res = mysqli_query($db,$query);
        if (mysqli_num_rows($res) == 1) {
            $image = mysqli_fetch_array($res);
            // Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
            header("Content-type: image/*");
            // И  передаем сам файл
            echo $image['picture'];
        }
        else echo "Ошибка";
    }
} else echo "Ошибка";
?>
