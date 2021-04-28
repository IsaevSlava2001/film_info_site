<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Подтверждение почты</title>
</head>
<body>
    <?php
    echo '<center><text id="good_authorisation">Введите пожалуйста код, отправленный вам на почту ниже. Не забудьте проверить папку спам, если вам не пришло письмо</text></center><br>';
    ?>
    <form action="check_email.php" method="post">
    <input type="text" name="check">
    <input type="submit" value="Проверить">
    <?php
    $error = (isset($_GET['info']) ) ? $_GET['info'] : '';
    switch($error) {
    case 'false':
        echo '<br><text id="error_authorisation">Код неверен</text><br>';
    break;
    }
    ?>
</form>
</body>
</html>