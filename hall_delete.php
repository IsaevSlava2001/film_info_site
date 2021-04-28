<?php
include "conection.php";
$hall_num=$_POST['hall_name'];
    require_once 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    $query = "DELETE FROM `hall` WHERE `hall_num`='$hall_num'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    header("location:change_hall.php?main_info=error");