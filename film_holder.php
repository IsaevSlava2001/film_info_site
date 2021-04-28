<?php
    include "conection.php";

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query = "SELECT `id`,`name`, `intro`, `age_min`,`photo`,`duration`, `genre`,`year` FROM `films`";
    $result = mysqli_query($link, $query);
    $names=[];
    $films_info = [];
    $genres=[];
    $min_ages=[];
    $years=[];
    while($film_info = mysqli_fetch_assoc($result))
    {
        $names[]=$film_info['name'];
        $years[]=$film_info['year'];
        $genres[]=$film_info['genre'];
        $min_ages[]=$film_info['age_min'];
        $films_info[] = $film_info;
    }
    $years=array_unique($years);
    $genres=array_unique($genres);
    $min_ages=array_unique($min_ages);
?>