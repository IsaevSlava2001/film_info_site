<?php
    $kod='';
    $file1 = fopen("kod_check.txt", "r");
    $mytext="";
    while (!feof($file1))
    {
    $kod .= fgets($file1, 999);
    } fclose($file1);
        $inp_kod=$_POST['check'];
        if($inp_kod==$kod)
        {
            header("Location:redir_email_main.php");
        }
        else
        {
            header("Location:auth_check_email.php?info=false");
        }
    ?>