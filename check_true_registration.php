<?php
$name=$_POST["name"];
$surname=$_POST["surname"];
$mail=$_POST["mail"];
$date_birth=$_POST["date_birth"];
$pass=$_POST["pass"];
$rep_pass=$_POST["rep_pass"];
$invalid_mail = false;
$email_check=true;
$name_check=true;
$surname_check=true;
$date_birth_check=true;
$pass_check=true;
$rep_pass_check=true;

if(empty($name))
{
    $name_check=false;
}
if(empty($surname))
{
    $surname_check=false;
}
if(empty($date_birth)||$date_birth>date('Y-m-d'))
{
    $date_birth_check=false;
}
if(empty($pass))
{
    $pass_check=false;
}
if(empty($rep_pass)||($pass!=$rep_pass))
{
    $rep_pass_check=false;
}

if(!empty($mail) && $mail != '')
{
    $valid_mail = true;
    require_once 'conection.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    $query = "SELECT `mail` FROM `users`";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result){
        $rows = mysqli_num_rows($result);
        $i = 0;
        while ($row = mysqli_fetch_row($result)) 
        {
           if($row[$i] == $mail)
           {
               $invalid_mail = true;
           $i++;
           }
        }
        mysqli_free_result($result);
    }

    mysqli_close($link);

    if($invalid_mail) {
        $email_check=false;
    }
}

if($name_check==false||$surname_check==false||$date_birth_check==false||$pass_check==false||$rep_pass_check==false||$email_check==false)
{
    header("Location:registration.php?error=main_info&name_check=$name_check&surname_check=$surname_check&date_birth_check=$date_birth_check&pass_check=$pass_check&rep_pass_check=$rep_pass_check&email_check=$email_check");
}
else
{
    $kod=rand(1,1000);
    $kod=bin2hex($kod);
    $fp = fopen("kod_check.txt", "w");
    fwrite($fp, $kod);
    fclose($fp);
    $headers = 'From: sinema_bilets@SBSite.com' . "\r\n" .
    'Reply-To: sinema_bilets@SBSite.com' . "\r\n";
    $to      = (string)$mail;
    $subject = 'Проверка почты от сайта';
    $message = "Ваш код: ".$kod.". Пожалуйста введите его в форму проверки почты";
    mail($to, $subject, $message, $headers);
    $fp = fopen("kod_check.txt", "w");
    fwrite($fp, $kod);
    fclose($fp);
    $text=$name."+".$surname."+".$mail."+".$date_birth."+".$pass;
    $fp = fopen("data.txt", "w");
    fwrite($fp, $text);
    fclose($fp);
       header("Location:auth_check_email.php");
    }
?>