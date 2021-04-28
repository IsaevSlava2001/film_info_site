<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <form action="film_add_check.php" method="post">
    <center>
    название<input type="text" name="name" id=""><br>
    интро<input type="text" name="intro" id=""><br>
    возрастной рейтинг<select name="min_age" id=""><br>
    <option value="1">0+</option>
    <option value="2">2+</option>
    <option value="3">4+</option>
    <option value="4">6+</option>
    <option value="5">8+</option>
    <option value="6">10+</option>
    <option value="7">12+</option>
    <option value="8">14+</option>
    <option value="9">16+</option>
    <option value="10">18+</option>
    <option value="11">21+</option>
    </select><br>
    продолжиительность (чч:мм)<input type="time" name="duration" id="" max="03:00" min="00:05" required><br>
    жанр<input type="text" name="genre" id=""><br>
    год выпуска<input type="text" name="year" id=""><br>
    <input type="submit" value="добавить фильм">
    <input type="reset" value="очистить">
    </center>
    <?php
        $error = (isset($_GET['error']) ) ? $_GET['error'] : '';
        switch($error) 
        {
        case 'main_info':
        $name = $_GET['name_valid'];
        $intro = $_GET['intro_valid'];
        $min_age = $_GET['min_age_valid'];
        $duration = $_GET['duration_valid'];
        $genre = $_GET['genre_valid'];
        $year = $_GET['year_valid'];

        if ($name == 0) echo '<center><text id="error_authorisation">У Вас ошибка в названии фильма</text></center><br>';
        if ($intro == 0) echo '<center><text id="error_authorisation">У Вас ошибка в интро</text></center><br>';
        if ($min_age == 0) echo '<center><text id="error_authorisation">У Вас ошибка в возрастном ограничении</text></center><br>';
        if ($duration == 0) echo '<center><text id="error_authorisation">У Вас ошибка в продолжительности</text></center><br>';
        if ($genre == 0) echo '<center><text id="error_authorisation">У Вас ошибка в жанре</text></center><br>';
        if($year==0) echo '<center><text id="error_authorisation">У Вас ошибка в годе выхода</text></center><br>';
        break;
        case'good':
            echo '<center><text id="good_authorisation">Фильм добавлен</text></center><br>';
        break;
        }
        ?>
    </form>
</body>
</html>