<?php
include "film_delete_holder.php";
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
    <form>
        <h1>Удаление фильмов</h1>
        <?php
        if(count($names)>0)
        {
            ?>
    <select id="names">
        <?php
            $i = 1;
            foreach($names as $name)
            {
                echo "<option value='".$i."'>".$name."</option>";
                $i++;
            }
        
        ?>
     </select>
     <button id="delete_btn">Удалить</button>
     <?php
     }
     else
     {
         echo "<text>Фильмов нет. Добавьте пожалуйста фильмы, чтобы их можно было удалять.</text>";
     }
     ?>
     <div id="info">
     </div>
     </form>
     <form method="POST" enctype="multipart/form-data" action="file_handler.php">
         <h1>Добавление фильмов</h1>
         <input type="file" name="photo"><br>
         <input type="submit" value="загрузить файл">
         <input type="reset" value="сбросить">
    </form>
</body>
</html>