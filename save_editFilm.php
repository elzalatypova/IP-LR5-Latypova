<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Латыпова Эльза</title>
</head>
<body>
	<?php
	include ("checkSession.php");
	define ("HOST", "localhost");
	define ("USER", "f0593243_films");
	define ("PASS", "123");
	define ("DB", "f0593243_films"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8');
	 $zapros="UPDATE film SET name_film='".$_GET['name_film'].
	"', genre='".$_GET['genre']."', director='"
	.$_GET['director']."', year='".$_GET['year'].
	"', fees='".$_GET['fees']."' WHERE id_film="
	.$_GET['id_film'];
	 $mysqli->query($zapros);
	 if (mysqli_affected_rows($mysqli)>0) {
	 echo 'Все сохранено. <a href="index.php"> Вернуться к списку
	Фильмов </a>'; }
	 else { echo 'Ошибка сохранения. <a href="index.php">
	Вернуться к списку фильмов</a> '; }
	?>

</body>
</html>