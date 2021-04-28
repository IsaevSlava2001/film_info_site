<?php
    include 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $hall_num = $_POST['hall_name'];
    $query = "SELECT `id`,`hall_num`,`num_rows`,`num_place` FROM `hall` WHERE `hall_num`='$hall_num'";
    $result=mysqli_query($link,$query);
    while($row=mysqli_fetch_array($result))
    {
    session_start();
    $_SESSION['hall_id']=$row['id'];
    $_SESSION['hall_hall_num']=$row['hall_num'];
    $_SESSION['hall_num_rows']=$row['num_rows'];
    $_SESSION['hall_num_place']=$row['num_place'];
    }
    header("location:change_hall.php");
?>