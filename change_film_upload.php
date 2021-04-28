<?php
session_start();
include 'conection.php';
$id=$_POST['id'];
$name=$_POST['film'];
$intro=$_POST['intro'];
$age_min=$_POST['age_min'];
$duration=$_POST['duration'];
$genre=$_POST['genre'];
$year=$_POST['year'];
$genre=mb_strtolower($genre);
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$query="UPDATE `films` SET`name`='$name',`intro`='$intro',`age_min`='$age_min',`duration`='$duration',`genre`='$genre',`year`='$year' WHERE `id` ='$id'";
mysqli_query($link,$query);
$_SESSION['film_id']=NULL;
$_SESSION['film_name']=NULL;
$_SESSION['film_intro']=NULL;
$_SESSION['film_age_min']=NULL;
$_SESSION['film_duration']=NULL;
$_SESSION['film_genre']=NULL;
$_SESSION['film_year']=NULL;
header("location:change_film.php");
?>