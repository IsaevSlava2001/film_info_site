<?php
$books=NULL;
    session_start();
    if(isset($_SESSION['id']))
    {
        $books=1;
    }
    else
    {
        $books=0;
    }
    echo json_encode($books);
?>