<?php
//занос в бд из файла, удаление файла
$data='';
$file1 = fopen("data.txt", "r");
    $mytext="";
    while (!feof($file1))
    {
    $data .= fgets($file1, 999);
    } fclose($file1);
    unlink("data.txt");
    $data_mass=explode("+",$data);
    require_once 'conection.php';
        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
        $name_sql = htmlentities(mysqli_real_escape_string($link, $data_mass[0]));
        $surname_sql = htmlentities(mysqli_real_escape_string($link, $data_mass[1]));
        $mail_sql=htmlentities(mysqli_real_escape_string($link, $data_mass[2]));
        $date_rog_sql=htmlentities(mysqli_real_escape_string($link, $data_mass[3]));
        $pass_sql=htmlentities(mysqli_real_escape_string($link, $data_mass[4]));
        $query ="INSERT INTO `users` VALUES(NULL,'$name_sql','$surname_sql','$mail_sql','$date_rog_sql','$pass_sql',NULL,'3')";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        mysqli_close($link);
sleep(3);
header("Location: authorisation.php?redirect=1");
exit;
?>