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
<form id="reset_pass" action="check_email_pass_forget.php" method="POST">
    Пожалуйста, введите email, указанный при регистрации. На него придет правильный пароль
    <br>
    <input type="email" name="email"><br>
        <input type="submit" name="forget_pass" value="Отправить пароль"><br>
        <?php
        $error = (isset($_GET['error']) ) ? $_GET['error'] : '';
    switch($error) 
    {
    case 'main_info':
        echo '<center><text id="error_authorisation">Почта не найдена в базе данных</text></center><br>';
    }
        ?>
        </form>
</body>
</html>