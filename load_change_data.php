<?php
session_start();
$id=$_POST['id'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$mail=$_POST['mail'];
$date_birth=$_POST['date_birth'];
$password_load=$_POST['password'];
$bilets=$_POST['bilets'];
$role=$_POST['role'];
include 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query="UPDATE `users` SET`name`='$name',`surname`='$surname',`mail`='$mail',`date_birth`='$date_birth',`password`='$password_load',`bilets`='$bilets',`role`='$role' WHERE `id` ='$id'";
mysqli_query($link,$query);
if(isset($_SESSION['id_change']))
{
$_SESSION['id_change']=NULL;
    $_SESSION['name_change']=NULL;
    $_SESSION['surname_change']=NULL;
    $_SESSION['mail_change']=NULL;
    $_SESSION['role_change']=NULL;
    $_SESSION['date_birth_change']=NULL;
    $_SESSION['bilets_change']=NULL;
    $_SESSION['password_change']=NULL;  
header("Location:change_data.php");
}
else
{
    session_destroy();
    header("Location:authorisation.php");
}
