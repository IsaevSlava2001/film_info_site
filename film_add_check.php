<?php
session_start();
include "conection.php";
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$name=$_POST['name'];
$intro=$_POST['intro'];
$min_age=$_POST['min_age'];
$genre=$_POST['genre'];
$year=$_POST['year'];
$duration=$_POST['duration'];
$min_age_db;
$name_valid=false;
$intro_valid=false;
$min_age_valid=false;
$genre_valid=false;
$year_valid=false;
$duration_valid=false;
if(isset($name)||$name!='')
{
    $name_valid=true;
}
if(isset($intro)||$intro!='')
{
    $intro_valid=true;
}
if(isset($min_age)||$min_age!='')
{
    $min_age_valid=true;
    switch($min_age)
    {
    case 1:
    $min_age_db=0;
    break;
    case 2:   
    $min_age_db=2;
    break;
    case 3: 
    $min_age_db=4;
    break;
    case 4:
    $min_age_db=6;
    break;
    case 5:
    $min_age_db=8;
    break;
    case 6:
    $min_age_db=10;
    break;
    case 7:
    $min_age_db=12;
    break;
    case 8:
    $min_age_db=14;
    break;
    case 9:
    $min_age_db=16;
    break;
    case 10:
    $min_age_db=18;
    break;
    case 11:
    $min_age_db=21;
    break;
    }
}
if(isset($genre)||$genre!='')
{
    $genre_valid=true;
    $genre=mb_strtolower($genre);
}
if(isset($year)||$year!='')
{
    $year_valid=true;
}
if(isset($duration)||$duration!='')
{
    $duration_valid=true;
}
if($name_valid&&$intro_valid&&$genre_valid&&$min_age_valid&&$year_valid&&$duration_valid)
{
    $film_name=$_SESSION['name_pic'];
    $query = "INSERT INTO `films` VALUES(NULL,'$name','$intro','$min_age_db','$film_name','$duration','$genre','$year')";
    $result = mysqli_query($link, $query);
    header('location:add_film.php?error=good');
}
else
{
    header("location:add_film.php?error=main_info&name_valid=$name_valid&intro_valid=$intro_valid&genre_valid=$genre_valid&min_age_valid=$min_age_valid&year_valid=$year_valid&duration_valid=$duration_valid");
}
?>