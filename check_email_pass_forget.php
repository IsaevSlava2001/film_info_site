<?php
$mail=$_POST["email"];
$pass="";
include 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query="SELECT `password` FROM `users` WHERE `mail` ='$mail'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)!=0&&mysqli_num_rows($result)==1)
{
    while($row=mysqli_fetch_array($result))
    {
    $pass=$row['password'];
    }
    $headers = 'From: sinema_bilets@SBSite.com' . "\r\n" .
    'Reply-To: sinema_bilets@SBSite.com' . "\r\n";
    $to      = (string)$mail;
    $subject = 'Пароль от аккаунта';
    $message = "Ваш пароль: ".$pass;
    mail($to, $subject, $message, $headers);
    header("Location:authorisation.php");
}
else
{
    header("Location:authorisation.php?error=main_info");
    die;
}
?>