<?php
session_start();
if(!isset($_SESSION['role']))
{
    $_SESSION['role']=0;
}
//данныые из сессии
if($_SESSION['role']==1)
{
    echo 'Добро пожаловать, '.$_SESSION['name'];
    ?>
    <div id="links">
    <a href="change_hall.php">Изменить/удалить зал</a>
    <a href="change_data_film.php">Добавить/удалить фильм</a>
    <a href="change_data.php">Изменить данные о пользователе</a>
    <a href="add_hall.php">Добавить зал</a>
    <a href="change_film.php">Изменить фильм</a>
    <a id="mykab" href="change_seans.php">Добавить/удалить сеанс</a>
    <a id="mykab" href="my_kab.php">Личный кабинет</a>
    <a href="exit.php">Выйти</a>
    </div>
    <?php
}
else if($_SESSION['role']==2)
{
    echo 'Добро пожаловать, '.$_SESSION['name'];
    ?>
    <div id="links">
    <a href="change_film.php">Изменить фильм</a>
    <a href="change_data.php">Изменить данные о пользователе</a>
    <a id="mykab" href="change_seans.php">Добавить/удалить сеанс</a>
    <a id="mykab" href="my_kab.php">Личный кабинет</a>
    <a href="exit.php">Выйти</a>
    </div>
    <?php
}
else if($_SESSION['role']==3)
{
    echo 'Добро пожаловать, '.$_SESSION['name'];
    ?>
    <div id="links">
    <a id="mykab" href="my_kab.php">Личный кабинет</a>
    <a href="exit.php">Выйти</a>
    </div>
    <?php
}
if(isset($_SESSION['role'])&&$_SESSION['role']!=0)
    {
        echo '<hr>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Главная</title>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <script src="script.js"></script>
</body>
</html>