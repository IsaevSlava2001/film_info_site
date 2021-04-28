<?php
include 'conection.php';
$film_name=$_POST['film_name'];
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query="SELECT * FROM `films` WHERE `name` ='$film_name'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)!=0)
{
    while($row=mysqli_fetch_array($result))
    {
    session_start();
    $_SESSION['film_id']=$row['id'];
    $_SESSION['film_name']=$row['name'];
    $_SESSION['film_intro']=$row['intro'];
    $_SESSION['film_age_min']=$row['age_min'];
    $_SESSION['film_photo']=$row['photo'];
    $_SESSION['film_duration']=$row['duration'];
    $_SESSION['film_genre']=$row['genre'];
    $_SESSION['film_year']=$row['year'];
    }
    header("Location:change_film.php");
}
?>