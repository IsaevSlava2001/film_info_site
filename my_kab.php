<?php
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
<form action="load_change_data.php" method="post">
            <text id="error_authorisation">Внимание! Чтобы данные обновились, необходимо выполнить процедуру повторной авторизации. После нажатия на кнопку "изменить данные о себе" Вас автоматически разлогинит из аккаунта</text>
            <input type="hidden" name="id" value=<?php echo $_SESSION['id']?>><br>
            Имя<input type="text" name="name" value=<?php echo $_SESSION['name']?>><br>
            Фамилия<input type="text" name="surname" value=<?php echo $_SESSION['surname']?>><br>
            Почта<input type="email" name="mail" value=<?php echo $_SESSION['mail']?>><br>
            Дата рождения<input type="date" name="date_birth" value=<?php echo $_SESSION['date_birth']?>><br>
            Пароль<input type="text" name="password" value=<?php echo $_SESSION['password']?>><br>
            <input type="hidden" name="bilets" value=<?php echo $_SESSION['bilets']?>><br>
            <input type="hidden" name="role" value=<?php echo $_SESSION['role']?>><br>
            <input type="submit" value="изменить данные о себе">
            </form>
</body>
</html>