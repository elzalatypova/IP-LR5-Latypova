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
	 $rows=$mysqli->query("SELECT 	begin_data_time, count_free_places, count_busy_places, id_film, id_hall FROM sessions WHERE
	id_session=".$_GET['id_session']);
	  $films=$mysqli->query("SELECT id_film, name_film FROM film ");
	  $halls=$mysqli->query("SELECT id_hall, name_hall FROM halls ");
	 while ($st = mysqli_fetch_array($rows)) {
	 $id_session=$_GET['id_session'];
	 $begin_data_time = $st['begin_data_time'];
	 $count_free_places = $st['count_free_places'];
	 $count_busy_places = $st['count_busy_places'];
	 $id_film_curent = $st['id_film'];
	 $id_hall_curent = $st['id_hall'];
	 }
	print "<form action='save_editSession.php' metod='get'>";
	print "Дата и время: <input name='begin_data_time' size='50' type='datatime'
	value='".$begin_data_time."'>";
	print "<br>Количество свободных мест: <input name='count_free_places' size='20' type='text'
	value='".$count_free_places."'>";
	print "<br>Количество занятых мест: <input name='count_busy_places' size='20' type='text'
	value='".$count_busy_places."'>";
	print "<br> фильм <select name='id_film' >";
		while ($row = mysqli_fetch_array($films)) {
			if ($id_film_curent == $row['id_film']) {
				print "<option value='" . $row['id_film'] ."' selected='selected'>" . $row['name_film'] ."</option>";
			} else {print "<option value='" . $row['id_film'] ."'>" . $row['name_film'] ."</option>";}
		    
		}
		print "</select>";
	print "<br> Зал <select name='id_hall' >";
		while ($row = mysqli_fetch_array($halls)) {
			if ($id_film_curent == $row['id_hall']) {
				print "<option value='" . $row['id_hall'] ."' selected='selected'>" . $row['name_hall'] ."</option>";
			} else {print "<option value='" . $row['id_hall'] ."'>" . $row['name_hall'] ."</option>";}
		    
		}
		print "</select>";
	print "<input type='hidden' name='id_session' value='".$id_session."'> <br>";
	print "<input type='submit' name='' value='Сохранить'>";
	print "</form>";
	print "<p><a href=\"index.php\"> Вернуться к списку
	сеансов </a>";
	?>
</body>
</html>