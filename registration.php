<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>регистрация</title>
</head>
<body>
    <?php
    require 'header.php';
    ?>
    <form action="check_true_registration.php" method="POST">
        <center>Регистрация</center><br>
        <center>Имя</center><br>
        <center><input type="text" name="name"></center><br>
        <center>Фамилия</center><br>
        <center><input type="text" name="surname"></center><br>
        <center>Почта</center><br>
        <center><input type="email" name="mail"></center><br>
        <center>дата рождения</center><br>
        <center><input type="date" name="date_birth"></center><br>
        <center>пароль</center><br>
        <center><input type="password" name="pass"></center><br>
        <center>Подтверждение пароля</center><br>
        <center><input type="password" name="rep_pass"></center><br>
        <center><input type="submit" value="Подтвердить данные">
        <input type="reset"></center>
        <?php
        $error = (isset($_GET['error']) ) ? $_GET['error'] : '';
        switch($error) 
        {
        case 'main_info':
        $name = $_GET['name_check'];
        $surname = $_GET['surname_check'];
        $date_birth = $_GET['date_birth_check'];
        $pass_check = $_GET['pass_check'];
        $rep_pass_check = $_GET['rep_pass_check'];
        $email_check = $_GET['email_check'];

        if ($name == 0) echo '<center><text id="error_authorisation">У Вас ошибка в имени</text></center><br>';
        if ($surname == 0) echo '<center><text id="error_authorisation">У Вас ошибка в фамилии</text></center><br>';
        if ($date_birth == 0) echo '<center><text id="error_authorisation">У Вас ошибка в дате рождения</text></center><br>';
        if ($pass_check == 0) echo '<center><text id="error_authorisation">У Вас ошибка в пароле</text></center><br>';
        if ($email_check == 0) echo '<center><text id="error_authorisation">У Вас ошибка в электронной почте или Вы уже зарегистрированы</text></center><br>';
        if($rep_pass_check==0) echo '<center><text id="error_authorisation">У Вас ошибка в подтверждении пароля</text></center><br>';
        break;
        }
        ?>
    </form>
</body>
</html>