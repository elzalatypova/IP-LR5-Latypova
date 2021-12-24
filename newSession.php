<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Латыпова Эльза</title>
</head>
<body>
	<?php include ("checkSession.php"); ?>
	<H2>Регистрация на киносеанса:</H2>
	<form action="save_newSession.php" metod="get">
		Дата и время пишитеся в виде dd.mm.yyyy:hh:mm
	<br>Дата и время: <input name="begin_data_time" size="50" type="text">
	<br>Свободные места: <input name="count_free_places" size="20" type="text">
	<br>Занятые места: <input name="count_busy_places" size="20" type="text">
	<br>
	<?php 
	define ("HOST", "localhost");
	define ("USER", "f0593243_films");
	define ("PASS", "123");
	define ("DB", "f0593243_films"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8');
	 $films=$mysqli->query("SELECT id_film, name_film FROM film ");
	 $halls=$mysqli->query("SELECT id_hall, name_hall FROM halls ");
	echo " Фильм <select name='id_film'>";
		while ($row = mysqli_fetch_array($films)) {
		    print "<option value='" . $row['id_film'] ."'>" . $row['name_film'] ."</option>";
		}
		echo "</select>";
		echo " Зал <select name='id_hall'>";
		while ($row = mysqli_fetch_array($halls)) {
		    print "<option value='" . $row['id_hall'] ."'>" . $row['name_hall'] ."</option>";
		}
		echo "</select>";

		 ?>
	<p><input name="add" type="submit" value="Добавить">
	<input name="b2" type="reset" value="Очистить"></p>
	</form>
	<p>
	<a href="index.php"> Вернуться к списку программ </a>
</body>
</html>