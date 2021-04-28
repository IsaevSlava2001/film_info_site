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
    include 'seans_holder.php';
    ?>
    <form action="seans_upload.php" method="post">
    <h1>Добавление сеанса</h1>
    <center><h2><text id="error_authorisation">Внимание! При добавлении сеансов, необходимо их вводить в порядке возрастания времени</text></h2></center>
    <br>
    Выберите фильм<select id="films" name="film">
        <?php
            $i = 1;
            foreach($names as $name)
            {
                echo "<option value='".$name."'>".$name."</option>";
                $i++;
            }
        ?>
     </select><br>
     Выберите время начала<input type="time" name="time_start" id=""><br>
     Введите цену<input type="text" name="price" id=""><br>
     Выберите номер зала<select id="halls" name="hall">
        <?php
            $i = 1;
            foreach($hall_nums as $hall_num)
            {
                echo "<option value='".$hall_num."'>".$hall_num."</option>";
                $i++;
            }
        ?>
     </select><br>
     <input type="submit" value="Подтвердить">
     <input type="reset" value="Сбросить">
     <?php
     if(isset($_GET['main_info']))
     {
     $error=$_GET['main_info'];
     switch($error)
    {
         case 'error':
            echo '<center><text id="error_authorisation">В выбранное время в выбранном зале еще будет идти фильм</text></center><br>';
         break;
         case 'good':
            echo '<center><text id="good_authorisation">Сеанс добавлен</text></center><br>';
         break;
         case 'error_time':
             echo '<center><text id="error_authorisation">Данный сеанс стоит раньше, чем самый ранний сеанс в этом зале. Пожалуйста, удалите самый ранний сеанс в этом зале, или поставьте данный сеанс на более позднее время.</text></center><br>';
         break;
    }
    }
    ?>
    </form>
    <form action="seans_delete.php" method="post">
    <h1>Удаление сеанса</h1>
    Выберите зал<select id="halls" name="hall">
        <?php
            $i = 1;
            foreach($hals as $hall)
            {
                echo "<option value='".$hall."'>".$hall."</option>";
                $i++;
            }
        ?>
     </select><br>
     Выберите время сеанса<select id="times" name="time">
        <?php
            $i = 1;
            foreach($times as $time)
            {
                echo "<option value='".$time."'>".$time."</option>";
                $i++;
            }
        ?>
     </select><br>
     <input type="submit" value="Удалить">
     <?php
     if(isset($_GET['main_info']))
     {
     $error=$_GET['main_info'];
     switch($error)
    {
         case 'god':
            echo '<center><text id="good_authorisation">Сеанс удален</text></center><br>';
         break;
         case 'bad':
            echo '<center><text id="bad_authorisation">Сеанс не найден</text></center><br>';
         break;
    }
    }
    ?>
    </form>
</body>
</html>