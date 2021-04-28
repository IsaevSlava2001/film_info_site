<?php
$mail=$_POST['mail'];
$pass=$_POST['password'];
    include 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query="SELECT * FROM `users` WHERE `mail` ='$mail' AND `password`='$pass'";
//echo $query;
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)!=0)
{
    while($row=mysqli_fetch_array($result))
    {
    session_start();
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['surname']=$row['surname'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['role']=$row['role'];
    $_SESSION['date_birth']=$row['date_birth'];
    $_SESSION['bilets']=$row['bilets'];
    $_SESSION['password']=$row['password'];
    }
    //Ввести проверку класса пользователя и перекидывание в разные типы аккаунтов
    header("Location:index.php");
}
else
{
    header("Location:authorisation.php?error=main_info");
    die;
}
?>