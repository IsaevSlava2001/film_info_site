<?php
session_start();
$id=$_POST['id'];
$num_rows=$_POST['num_rows'];
$num_place=$_POST['num_place'];
include 'conection.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query="UPDATE `hall` SET `num_rows`='$num_rows',`num_place`='$num_place' WHERE `id` ='$id'";
mysqli_query($link,$query);
$_SESSION['hall_id']=NULL;
    $_SESSION['hall_hall_num']=NULL;
    $_SESSION['hall_num_rows']=NULL;
    $_SESSION['hall_num_place']=NULL;
header("location:change_hall.php");