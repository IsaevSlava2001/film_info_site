<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.4.1.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <?php
    include "header.php";
    ?>
    <form action="find_user.php" method="post">
        <input type="text" name="id" id="" placeholder="Номер пользователя">
        <input type="text" name="name" id="" placeholder="Имя">
        <input type="text" name="surname" id="" placeholder="Фамилия">
        <input type="text" name="mail" id="" placeholder="почта">
        <input type="text" name="date_birth" id="date_birth" placeholder="дата рождения в формате(ГГГГ:ММ:ДД)">
        <input type="text" name="role" id="" placeholder="роль">
        <input type="submit" value="Найти">
        <?php
        $error = (isset($_GET['error']) ) ? $_GET['error'] : '';
        switch($error) 
        {
        case 'to_much_users':
            echo '<text id="error_authorisation">Слишком много людей найдено. Укажите конкретного пользователя</text>';
        break;
        case 'to_less_users':
            echo '<text id="error_authorisation">Слишком мало людей найдено. Попробуйте расширить поисковые данные</text>';
        break;
        case 'another_error':
            echo '<text id="error_authorisation">Ошибка</text>';
        break;
        }
        ?>
        </form>
        <?php
        if(!isset($_SESSION['id_change']))
        {
        ?>
        <button id="all_users">Получить всех пользователей</button><br>
        <div id="ajax_container"></div>
        <?php
        }
        else
        {
            ?>
            <form action="load_change_data.php" method="post">
            <input type="hidden" name="id" value=<?php echo $_SESSION['id_change']?>><br>
            Имя<input type="text" name="name" value=<?php echo $_SESSION['name_change']?>><br>
            Фамилия<input type="text" name="surname" value=<?php echo $_SESSION['surname_change']?>><br>
            Почта<input type="email" name="mail" value=<?php echo $_SESSION['mail_change']?>><br>
            Дата_рождения<input type="date" name="date_birth" value=<?php echo $_SESSION['date_birth_change']?>><br>
            Пароль<input type="text" name="password" value=<?php echo $_SESSION['password_change']?>><br>
            Билеты<input type="text" name="bilets" value=<?php echo $_SESSION['bilets_change']?>><br>
            Роль<input type="number" name="role" value=<?php echo $_SESSION['role_change']?>><br>
            <input type="submit" value="отправить">
            </form>
            <?php
        }
        ?>

</body>
</html>