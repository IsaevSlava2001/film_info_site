<?php
include "conection.php";
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$name=$_GET['name'];

$query = "DELETE FROM `films` WHERE `name`='$name'";
    $result = mysqli_query($link, $query);

    if($result){
        echo "Фильм удален";
    } else {
        echo "Не удалось удалить фильм";
    }
?>