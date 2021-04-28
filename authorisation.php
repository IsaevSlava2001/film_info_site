<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <?php
    include "header.php";
    ?>
    <form action="check_auth.php" method="POST">
    Введите почту<br>
    <input type="text" name="mail"><br>
    Введите пароль<br>
    <input type="password" name="password"><br>
    <input type="submit" value="Подтвердить">
    <input type="reset">
    <?php
    $error = (isset($_GET['error']) ) ? $_GET['error'] : '';
    switch($error) {
    case 'main_info':
        echo '<center><text id="error_authorisation">Логин или пароль неверны</text></center><br>';
        ?>
        </form>
        <form id="forget_pass" action="forget_password.php" method="POST">
        <input type="submit" name="forget_pass" value="Забыли пароль?"><br>
        </form>
    <?php
        break;
    }
    ?>
</body>
</html>