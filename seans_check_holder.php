<?php
include "conection.php";

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query = "SELECT seans.`id`,`time`,`max_price`,seans.`film_num`,seans.`hall_num`,films.`name`,films.`intro`,films.`age_min`,films.`photo`,films.`duration`,films.`genre`,films.`year` FROM `seans`,`films` WHERE seans.`film_num`=films.`id`";
    $result = mysqli_query($link, $query);
    $times=[];
    while($film_info = mysqli_fetch_assoc($result))
    {
        $times[]=$film_info['time'];
        $films_info[] = $film_info;
    }
    $times=array_unique($times);
?>