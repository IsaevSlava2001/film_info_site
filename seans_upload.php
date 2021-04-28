<?php
include "conection.php";

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $time_start=$_POST['time_start'];
    $film=$_POST['film'];
    $hall=$_POST['hall'];
    $price=$_POST['price'];
    $time_less_eror=false;
    $query="SELECT `id` FROM `hall` WHERE `hall_num`='$hall'";
        $result = mysqli_query($link, $query);
        $id_hall=NULL;
        while($film_info = mysqli_fetch_assoc($result))
        {
            $hall=$film_info['id'];
            $id_hall=$film_info['id'];
        }
    $time_error=false;
    $query = "SELECT `duration` FROM `films` WHERE `name`='$film'";
    $result = mysqli_query($link, $query);
    $duration=NULL;
    while($film_info = mysqli_fetch_assoc($result))
    {
        $duration=$film_info['duration'];
    }
    $query = "SELECT `hall_num`,`time` FROM `seans` WHERE `hall_num`='$hall'";
    $result = mysqli_query($link, $query);
    $hall_num[]=NULL;
    $time[]=NULL;
    $film_num=NULL;
    $max_time=NULL;
    while($film_info = mysqli_fetch_assoc($result))
    {
        $hall_num[]=$film_info['hall_num'];
        $time[]=$film_info['time'];
    }
    $max_time=max($time);
    $query = "SELECT `film_num` FROM `seans` WHERE `hall_num`='$hall' AND `time`='$max_time'";
    $result = mysqli_query($link, $query);
    while($film_info = mysqli_fetch_assoc($result))
    {
        $film_num=$film_info['film_num'];
    }
    $query = "SELECT `duration` FROM `films` WHERE `id`='$film_num'";
    $result = mysqli_query($link, $query);
    $duration_old=NULL;
    while($film_info = mysqli_fetch_assoc($result))
    {
        $duration_old=$film_info['duration'];
    }
    $time_clean="00:10";
    $arr=array($duration_old,$max_time,$time_clean);
    function getTime($arr)
{
    $temp_value = null;
    $seconds = 0;
    $minutes = 0;
    foreach ($arr as $value) {
        $temp_value = explode(':', $value);
 
        $minutes += $temp_value[0];
        $seconds += $temp_value[1];
    }
    while ($seconds >= 60) {
        $minutes++;
        $seconds -= 60;
    }
    $res_time = str_pad($minutes, 2, 0, STR_PAD_LEFT) . ':' . str_pad($seconds, 2, 0, STR_PAD_LEFT);
    return $res_time;
}
$time_big=NULL;
if(isset($duration_old)&&isset($max_time)&&isset($time_clean))
{
    if(strtotime($max_time)>strtotime($time_start))
    {
        $time_less_eror=true;
    }
    else
    {
    $time_big=getTime($arr);
    if(strtotime($time_big)>strtotime($max_time))
    {
        $time_error=true;
    }
    }
}
    if($time_error)
    {
        header("location:change_seans.php?main_info=error");
    }
    if($time_less_eror)
    {
        header("location:change_seans.php?main_info=error_time");
    }
    else
    {
        $query="SELECT `id` FROM `films` WHERE `name`='$film'";
        $result = mysqli_query($link, $query);
        $id=NULL;
        while($film_info = mysqli_fetch_assoc($result))
        {
            $id=$film_info['id'];
        }
        $query = "INSERT INTO `seans`(`id`, `time`, `film_num`, `hall_num`, `max_price`, `bilets`) VALUES (NULL,'$time_start','$id','$id_hall','$price','')";
        $result = mysqli_query($link, $query);
        header("location:change_seans.php?main_info=good");
    }
?>