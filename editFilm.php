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
	 $rows=$mysqli->query("SELECT  name_film, genre, director, year, fees FROM film WHERE
	id_film=".$_GET['id_film']);
	 while ($st = mysqli_fetch_array($rows)) {
	 $id=$_GET['id_film'];
	 $name = $st['name_film'];
	 $genre = $st['genre'];
	 $director = $st['director'];
	 $year = $st['year'];
	 $fees = $st['fees'];
	 }
	print "<form action='save_editFilm.php' metod='get'>";
	print "Название: <input name='name_film' size='50' type='text'
	value='".$name."'>";
	print "<br>Жанр: <input name='genre' size='20' type='text'
	value='".$genre."'>";
	print "<br>Режисёр: <input name='director' size='20' type='text'
	value='".$director."'>";
	print "<br>год выпуска: <input name='year' size='30' type='date'
	value='".$year."'>";
	print "<br>Кассовые сборы: <input name='fees' size='30' type='text'
	value='".$fees."'>";
	print "<input type='hidden' name='id_film' value='".$id."'> <br>";
	print "<input type='submit' name='' value='Сохранить'>";
	print "</form>";
	print "<p><a href=\"index.php\"> Вернуться к списку
	фильмов </a>";
	?>
</body>
</html>