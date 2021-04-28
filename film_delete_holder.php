<?php
    include "conection.php";

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query = "SELECT `name` FROM `films`";
    $result = mysqli_query($link, $query);
    $names=[];
    while($film_info = mysqli_fetch_assoc($result))
    {
        $names[]=$film_info['name'];
    }
?>