<?php
include "hall_holder.php";
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
    <center>
        <form action="change_hall_select.php" method="post">
        <h1>Изменить зал</h1>
    <select id="hals" name="hall_name">
        <?php
            foreach($hall_nums as $hall_num)
            {
                echo "<option value='".$hall_num."'>".$hall_num."</option>";
            }
        ?>
     </select><br>
     <input type="submit" value="изменить">
     </form>
     </center>
     <?php
     if(isset($_SESSION['hall_id']))
     {
         ?>
     <form action="change_hall_upload.php" method="post">
     <input type="hidden" name="id" value="<?php echo $_SESSION['hall_id']?>" id="">
     <input type="hidden" name="hall_num" value="<?php echo $_SESSION['hall_hall_num']?>" id="">
     Количество рядов<input type="number" name="num_rows" value="<?php echo $_SESSION['hall_num_rows']?>" min="1" max="30" id=""><br>
     Количество мест в ряду<input type="number" value="<?php echo $_SESSION['hall_num_place']?>" name="num_place" min="1" max="30" id=""><br>
     <input type="submit" value="Подтвердить">
     </form>
     <?php
     }
     ?>
     <form action="hall_delete.php" method="post">
         <h1>Удалить зал</h1>
         Выбор номера зала<select id="hals" name="hall_name">
        <?php
            foreach($hall_nums as $hall_num)
            {
                echo "<option value='".$hall_num."'>".$hall_num."</option>";
            }
        ?>
     </select><br>
     <input type="submit" value="удалить">
     <?php
     if(isset($_GET['main_info']))
     {
         echo "<center><text id='good_authorisation'>Зал удален</text></center>";
     }
     ?>
         </form>
</body>
</html>