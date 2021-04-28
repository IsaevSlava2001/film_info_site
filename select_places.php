<?php
session_start();
$seans_id=$_GET['id'];
include 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $num_places=null;
    $num_rows=null;
    $bilets=null;
    $price=null;
$query="SELECT hall.`num_place`,hall.`num_rows`,seans.`bilets`,`max_price` FROM `seans`,`hall` WHERE seans.`id` ='$seans_id' AND seans.`hall_num`=hall.`id`";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result))
    {
    $num_places=$row['num_place'];
    $num_rows=$row['num_rows'];
    $bilets=$row['bilets'];
    $price=$row['max_price'];
    }
    $_SESSION['first']=$bilets;
    $_SESSION['seans_id']=$seans_id;
    $bilets_arr=[];
    $bilets_arr=explode('.',$bilets);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="jquery-3.4.1.js"></script>
        <script src="select_places.js"></script>
        <title>Document</title>
    </head>
    <body>
    <?php
    include 'header.php';
    ?>
    <div id="all_places">
        <br>
        <?php
        $tmp=0;
        $num_r=1;
        $tmps=(string)$tmp;
        ?>
        <center>
        <text>Цена за каждое место <?php echo $price?> рублей</text>
        </center>
        <table>
        <?php
    for($i=0;$i<$num_rows;$i++)
    {
        ?><tr><?php
        echo "<div id='row'>";
        ?><td><?php
        echo "ряд номер ".$num_r;
        ?></td><?php
        $num_r++;
        $num_place=1;
        for($k=0;$k<$num_places;$k++)
        {
            ?><td><?php
            if(in_array($tmps,$bilets_arr))
            {
                echo "<div class='red' id='".$tmp."'>$num_place</div>";
            }
            else
            {
                echo "<div class='green' id='".$tmp."'>$num_place</div>";
                
            }
            ?></td><?php
            $tmp++;
            $tmps=(string)$tmp;
            $num_place++;
        }
        echo "</div>";
        ?></tr><?php
        echo "<br>";
    }
    ?>
    </table>
    <br>
    <center>
    <button id="submit">Заказать</button>
    <br>
    </center>
    </div>
    </body>
    </html>