<?php
    include "conection.php";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query = "SELECT * FROM `users`";

    $result = mysqli_query($link, $query);


    $users = [];
    while($user = mysqli_fetch_assoc($result)){
        $users[] = $user;
    }

    echo "<table>";
    echo "<tr>";
        echo "<td>id</td><td>имя</td><td>фамилия</td>";
        echo "<td>почта</td><td>Дата рождения</td><td>Пароль</td><td>Билеты</td><td>Роль</td>";
        echo "</tr>";
    foreach($users as $user){
        echo "<tr>";
        echo "<td>".$user['id']."</td><td>".$user['name']."</td><td>".$user['surname']."</td>";
        echo "<td>".$user['mail']."</td><td>".$user['date_birth']."</td><td>".$user['password']."</td><td>".$user['bilets']."</td><td>".$user['role']."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>