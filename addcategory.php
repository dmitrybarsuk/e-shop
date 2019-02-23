<!-- Админ-панель -->
<?php
session_start();
global $result2;
include("db_connection.php");
if (isset($_POST['name'])) {
    $productname = $_POST['name'];
    if ($productname == '') {
        unset($productname);
    }
}
if (isset($_POST['price'])) {
    $price = (int)$_POST['price'];
    if ($price == null) {
        unset($price);
    }
}
if (isset($_POST['category'])) {
    $category = $_POST['category'];
    if ($category == null) {
        unset($category);
    }
}
if (isset($_POST['subcategory'])) {
    $subcategory = $_POST['subcategory'];
    if ($subcategory == null) {
        unset($subcategory);
    }
}
if (isset($_POST['storage'])) {
    $storage = (int)$_POST['storage'];
    if ($storage == null) {
        unset($storage);
    }
}
if (isset($_POST['articul'])) {
    $articul = $_POST['articul'];
    if ($articul == null) {
        unset($articul);
    }
}
if (isset($_POST['idProviders'])) {
    $idProviders = (int)$_POST['idProviders'];
    if ($idProviders == null) {
        unset($idProviders);
    }
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
    if ($description == null) {
        unset($description);
    }
}
if (isset($_POST['weight'])) {
    $weight =(int) $_POST['weight'];
}
if (isset($_POST['height'])) {
    $height =(int) $_POST['height'];

}
if (isset($_POST['length'])) {
    $length =(int) $_POST['length'];
}
if (isset($_POST['width'])) {
    $width =(int) $_POST['width'];

}


if (empty($productname) or empty($price) or empty($category) or empty($subcategory) or empty($storage) or empty($articul)
    or empty($idProviders) or empty($description)) {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
} else {

    $query = "INSERT INTO Products(ProdName,Price,category,subcategory,storage,articul,idProviders,description,weight,height,length,width)
                      VALUES ('$productname','$price','$category','$subcategory','$storage','$articul','$idProviders','$description',
                     '$weight','$height','$length','$width')";

    $result = mysqli_query($db, $query);
    echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
    $idProducts = mysqli_query($db, "SELECT MAX(idProducts) as maxId from products");
     $myrow1 = mysqli_fetch_array($idProducts);
     $idProd = (int)$myrow1['maxId'];
    if( !empty( $_FILES['image']['name'] ) ) {
         // Проверяем, что при загрузке не произошло ошибок
         if ($_FILES['image']['error'] == 0) {
             // Если файл загружен успешно, то проверяем - графический ли он
             if (substr($_FILES['image']['type'], 0, 5) == 'image') {
                 // Читаем содержимое файла
                 $image = file_get_contents($_FILES['image']['tmp_name']);
                 // Экранируем специальные символы в содержимом файла
                 $image = mysqli_escape_string($db,$image);
                 // Формируем запрос на добавление файла в базу данных
                 $queryimg = "INSERT INTO Pictures(idProducts,picture) VALUES($idProd, $image)"; //TODO: Хранимая функция
                 // После чего остается только выполнить данный запрос к базе данных
                 $result2 = mysqli_query($db,$queryimg)or trigger_error(mysqli_error($db)." in ". $queryimg);
             }
             else{
                 echo("Не картинка");
             }
         }
     }
     else {echo "Файла нет";}
    echo mysqli_errno($db) . ": " . mysqli_error($db) . "\n";
    if ($result == 'TRUE') {
        echo "Товар добавлен! Вы будете перенаправлены";
        exit("<html><head><meta    http-equiv='Refresh' content='4;    URL=adminpanel.php'></head></html>");
    } else {

        echo "Ошибка! Что то пошло не так =(<br>";
        echo("'$productname','$price','$category','$subcategory','$storage','$articul','$idProviders','$description',
                     '$weight','$height','$length','$width' <br>");
        echo gettype($price), "<br>";
        echo gettype($storage), "<br>";
        echo gettype($idProviders), "<br>";
        echo gettype($weight), "<br>";
    }
}

