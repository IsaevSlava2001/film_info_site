<?php
    include "seans_check_holder.php";
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
<h1>Сеансы</h1>
<center>
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
                echo "<p>Год выпуска: ".$film_info['year']."</p>";
                echo "<p>Время: ".$film_info['time']."г.</p>";
                echo "<p>Цена: ".$film_info['max_price']."руб.</p>";
                echo "<button class='bron' value='".$film_info['id']."'>Забронировать</button>";
                echo "<p></p>";
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