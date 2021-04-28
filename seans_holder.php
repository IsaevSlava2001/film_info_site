<?php
include "conection.php";

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query = "SELECT `hall_num`,`name` FROM `films`,`hall`";
    $result = mysqli_query($link, $query);
    $names=[];
    $hall_nums = [];
    while($film_info = mysqli_fetch_assoc($result))
    {
        $names[]=$film_info['name'];
        $hall_nums[]=$film_info['hall_num'];
    }
    $query = "SELECT `time` FROM `seans`";
    $result = mysqli_query($link, $query);
    $times=[];
    while($film_info = mysqli_fetch_assoc($result))
    {
        $times[]=$film_info['time'];
    }
    $query = "SELECT hall.hall_num FROM hall,seans WHERE hall.id=seans.hall_num";
    $result = mysqli_query($link, $query);
    $hals=[];
    while($film_info = mysqli_fetch_assoc($result))
    {
        $hals[]=$film_info['hall_num'];
    }
    $hals=array_unique($hals);
    $names=array_unique($names);
    $hall_nums=array_unique($hall_nums);
    $times=array_unique($times);
?>