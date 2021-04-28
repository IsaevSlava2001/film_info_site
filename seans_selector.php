<?php
    include "conection.php";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $time = $_GET['time'];
    $search = $_GET['text'];

    $query = "SELECT seans.`id`,`time`,`max_price`,seans.`film_num`,seans.`hall_num`,films.`name`,films.`intro`,films.`age_min`,films.`photo`,films.`duration`,films.`genre`,films.`year` FROM `seans`,`films` WHERE seans.`film_num`=films.`id` AND 1";
    if($time != ''&&$time!='Все времена')
    {
        $query .= " AND `time` = '$time'";
    }
    if($search != '')
    {
        $query .= " AND films.`name` LIKE '%$search%'";
    }
    $result = mysqli_query($link, $query);
    $books = [];
    while($book = mysqli_fetch_assoc($result))
    {
        $books[] = $book;
    }
    echo json_encode($books);