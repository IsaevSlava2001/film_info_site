<?php
    include "conection.php";

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query = "SELECT `id`,`hall_num`, `num_rows`, `num_place`FROM `hall`";
    $result = mysqli_query($link, $query);
    $hall_nums=[];
    while($film_info = mysqli_fetch_assoc($result))
    {
        $hall_nums[]=$film_info['hall_num'];
    }
?>