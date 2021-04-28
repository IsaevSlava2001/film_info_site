<?php
include "conection.php";
$hall_num=$_POST['hall_num'];
$num_rows=$_POST['num_row'];
$num_place=$_POST['num_place'];
$invalid_hall_num=false;
$mail=null;
$invalid_mail=null;
$email_check=true;
    require_once 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    $query = "SELECT `hall_num` FROM `hall`";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result)
    {
        $rows = mysqli_num_rows($result);
        $i = 0;
        while ($row = mysqli_fetch_row($result)) 
        {
           if($row[$i] == $mail)
           {
               $invalid_mail = true;
           $i++;
           }
        }
        mysqli_free_result($result);
    }

    mysqli_close($link);

    if($invalid_mail)
    {
        $email_check=false;
    }
    if(!$email_check)
    {
        header("Location:add_hall.php?error=main_info");
    }
    else
    {
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query = "INSERT INTO `hall` VALUES(NULL,'$hall_num','$num_rows','$num_place')";
mysqli_query($link, $query);
header("location:add_hall.php?error=good");
    }
?>