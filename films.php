<?php
    include "film_holder.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="jquery-3.4.1.js"></script>
    <script src="script.js"></script>
    <title>Document</title>
</head>
<body>
<?php
include 'header.php';
?>
<h1>Фильмы в прокате</h1>
<center>
    <select id="genres">
        <option value="0">Все жанры</option>
        <?php
            $i = 1;
            foreach($genres as $genre)
            {
                echo "<option value='".$i."'>".$genre."</option>";
                $i++;
            }
        ?>
     </select>
    <input type="text" id="search_name" placeholder="Поиск по названию фильма">
    <select id="min_age">
        <option value="0">Все возраста</option>
        <?php
            $i = 1;
            foreach($min_ages as $min_age)
            {
                echo "<option value='".$i."'>".$min_age."+</option>";
                $i++;
            }
        ?>
    </select>
    <select id="year">
        <option value="0">Все года выпуска</option>
        <?php
            $i = 1;
            foreach($years as $year)
            {
                echo "<option value='".$i."'>".$year."</option>";
                $i++;
            }
        ?>
    </select>
    <button id="search_btn">Поиск</button>
    <div class="catalog">
        <?php
            $i = 1;
            foreach($films_info as $film_info)
            {
                if($i == 1 || $i % 4 == 1)
                {
                    echo "<div class='rows'>";
                }
                echo "<div class='good'>";

                echo "<img src='/pict/".$film_info['photo']."'>";
                echo "<p>Название: ".$film_info['name']."</p>";
                echo "<p>Анонс: ".$film_info['intro']."</p>";
                echo "<p>Возрастной рейтинг: ".$film_info['age_min']."+</p>";
                echo "<p>Жанр: ".$film_info['genre']."</p>";
                echo "<p>продолжительность: ".$film_info['duration']."</p>";
                echo "<p>Год выпуска: ".$film_info['year']."г.</p>";
                echo "</div>";
                if($i % 4 == 0){
                    echo "</div>";
                }
                $i++;
            }
        ?>
    </div>
        </center>
</body>
</html>