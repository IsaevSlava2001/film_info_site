<?php
$id=$_POST['id'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$mail=$_POST['mail'];
$date_birth=$_POST['date_birth'];
$role=$_POST['role'];
include 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $id=mysqli_real_escape_string($link, $id);
    $query="SELECT * FROM `users` WHERE 1";
if(isset($id)&&$id!='')
{
    $query .= " AND `id` = '$id'";
}
if(isset($name)&&$name!='')
{
    $query .= " AND `name` = '$name'";
}
if(isset($surname)&&$surname!='')
{
    $query .= " AND `surname` = '$surname'";
}
if(isset($mail)&&$mail!='')
{
    $query .= " AND `mail` = '$mail'";
}
if(isset($date_birth)&&$date_birth!='')
{
    $query .= " AND `date_birth` = '$date_birth'";
}
if(isset($role)&&$role!='')
{
    $query .= " AND `role` = '$role'";
}
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)==1)
{
    while($row=mysqli_fetch_array($result))
    {
    session_start();
    $_SESSION['id_change']=$row['id'];
    $_SESSION['name_change']=$row['name'];
    $_SESSION['surname_change']=$row['surname'];
    $_SESSION['mail_change']=$row['mail'];
    $_SESSION['role_change']=$row['role'];
    $_SESSION['date_birth_change']=$row['date_birth'];
    $_SESSION['bilets_change']=$row['bilets'];
    $_SESSION['password_change']=$row['password'];
    }
    //Ввести проверку класса пользователя и перекидывание в разные типы аккаунтов
    header("Location:change_data.php");
}
else if(mysqli_num_rows($result)>1)
{
    header("Location:change_data.php?error=to_much_users");
    die;
}
else if(mysqli_num_rows($result)==0)
{
    header("Location:change_data.php?error=to_less_users");
    die;
}
else
{
    header("Location:change_data.php?error=another_error");
    die;
}