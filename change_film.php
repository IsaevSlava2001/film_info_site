<?php
session_start();
/*$_SESSION['film_name']=NULL;
echo $_SESSION['film_name'];*/
    include "film_holder.php";
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
    <center>
    <form action="change.php" method="POST">
    <select id="films" name="film_name">
        <?php
            /*$i = 1;*/
            foreach($names as $name)
            {
                echo "<option value='".$name."'>".$name."</option>";
                /*$_SESSION['film_name']=$name;
                $i++;*/
            }
        ?>
     </select><br>
     <input type="submit" value="изменить">
     </form>
     </center>
     
     <?php
     if(isset($_SESSION['film_id']))
     {
         ?>
         
        <form action="change_film_upload.php" method="post">
        <input type="hidden" name="id" id="" value="<?php echo $_SESSION['film_id']?>">
        Имя<input type="text" name="film" id="" value="<?php echo $_SESSION['film_name']?>"><br>
        Интро<input type="text" name="intro" id="" value="<?php echo $_SESSION['film_intro']?>"><br>
        Минимальный возраст<input type="number" name="age_min" id="" value="<?php echo $_SESSION['film_age_min']?>"><br>
        Продолжительность(ЧЧ:ММ:СС)<input type="time" name="duration" min="00:05" max="03:00" id="" value="<?php echo $_SESSION['film_duration']?>"><br>
        Жанр<input type="text" name="genre" id="" value="<?php echo $_SESSION['film_genre']?>"><br>
        Год выпуска<input type="text" name="year" id="" value="<?php echo $_SESSION['film_year']?>"><br>
        <input type="submit" value="изменить">
        </form>
        <?php
     }
     ?>
</body>
</html>