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
    $error=NULL;
    include 'header.php';
    ?>
    <form action="add_hall_load.php" method="post">
    номер зала<input type="number" min="1" name="hall_num" id=""><br>
    количество рядов<input type="number"  min="1" max="30" name="num_row" id=""><br>
    количество мест в ряду<input type="number" min="1" max="30" name="num_place" id=""><br>
    <input type="submit" value="подтвердить">
    <input type="reset" value="очистить">
    <?php
        if(isset($_GET['error']))
        {
            $error=$_GET['error'];
        }
        switch($error) 
        {
        case 'main_info':
            echo '<center><text id="error_authorisation">Зал с таким номером уже есть</text></center><br>';
        break;
        case 'good':
            echo '<center><text id="good_authorisation">Зал добавлен</text></center><br>';
        break;
        }
    ?>
    </form>
</body>
</html>