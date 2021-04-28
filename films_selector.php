<?php
    include "conection.php";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $genre = $_GET['genre'];
    $year = $_GET['year'];
    $min_age = $_GET['min_age'];
    $search = $_GET['text'];

    $query = "SELECT `id`,`name`, `intro`,`age_min`,`photo`, `genre`,`year`,`duration`,`photo` FROM `films` WHERE 1";
    if($genre != ''&&$genre!='Все жанры')
    {
        $query .= " AND `genre` = '$genre'";
    }
    if($year != ''&&$year!='Все года выпуска')
    {
        $query .= " AND `year` = '$year'";
    }
    if($min_age != ''&&$min_age!='Все возраста')
    {
        $query .= " AND age_min = '$min_age'";
    }
    if($search != '')
    {
        $query .= " AND `name` LIKE '%$search%'";
    }
    $result = mysqli_query($link, $query);
    $books = [];
    while($book = mysqli_fetch_assoc($result))
    {
        $books[] = $book;
    }
    echo json_encode($books);
?>