<?php
session_start();
include 'conection.php';
$bilets=$_SESSION['first'];
$selected=$_GET['bilets'];
$seans=$_SESSION['seans_id'];
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$ready=$bilets.$selected;
$query="UPDATE `seans` SET `bilets`='$ready' WHERE `id`='$seans'";
    mysqli_query($link, $query);
    $query="SELECT `name`,seans.`film_num` FROM `films`,`seans` WHERE seans.`id`='$seans' AND films.`id`=seans.`film_num`";
    $result = mysqli_query($link, $query);
    $name = NULL;
    while($film_info = mysqli_fetch_assoc($result))
    {
        $name=$film_info['name'];
    }
    $query="SELECT `time` FROM `seans` WHERE seans.`id`='$seans'";
    $time = NULL;
    $result = mysqli_query($link, $query);
    while($film_info = mysqli_fetch_assoc($result))
    {
        $time=$film_info['time'];
    }
    $user_id=$_SESSION['id'];
    $query="SELECT `bilets` FROM `users` WHERE `id`='$user_id'";
    $result = mysqli_query($link, $query);
    $bilets_get = NULL;
    while($film_info = mysqli_fetch_assoc($result))
    {
        $bilets_get=$film_info['bilets'];
    }
    $bilets_user=$bilets.".".$name.".".(string)$time.".".(string)$selected.".";
    $query="UPDATE `users` SET `bilets`='$bilets_user' WHERE `id`='$user_id'";
    mysqli_query($link, $query);
    header("location:seans.php");
?>