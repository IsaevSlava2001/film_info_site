<?php
include "conection.php";

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $hall=$_POST['hall'];
    $time=$_POST['time'];
    $query="SELECT `id` FROM `hall` WHERE `hall_num`='$hall' AND `time`='$time'";
    $result = mysqli_query($link, $query);
    $is_seans=null;
    while($film_info = mysqli_fetch_assoc($result))
    {
        $is_seans=$film_info['id'];
    }
    if(is_seans==1)
    {
    $query="SELECT `id` FROM `hall` WHERE `hall_num`='$hall'";
    $result = mysqli_query($link, $query);
    $hall_id=NULL;
    while($film_info = mysqli_fetch_assoc($result))
    {
        $hall_id=$film_info['id'];
    }
    $query="DELETE FROM `seans` WHERE `hall_num`='$hall_id' AND `time`='$time'";
    mysqli_query($link, $query);
    header("location:change_seans.php?main_info=god");
    }
    else
    {
    header("location:change_seans.php?main_info=bad");
    }
    ?>