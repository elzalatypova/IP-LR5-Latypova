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
	 $rows=$mysqli->query("SELECT id_hall, name_hall,
	category FROM halls WHERE
	id_hall=".$_GET['id_hall']);
	 while ($st = mysqli_fetch_array($rows)) {
	 $id=$_GET['id_hall'];
	 $name_hall = $st['name_hall'];
	 $category = $st['category'];
	 }
	print "<form action='save_editHall.php' metod='get'>";
	print "Название зала: <input name='name_hall' size='50' type='text'
	value='".$name_hall."'>";
	print "<br>Категория: <input name='category' size='20' type='text'
	value='".$category."'>";
	print "<input type='hidden' name='id_hall' value='".$id."'> <br>";
	print "<input type='submit' name='' value='Сохранить'>";
	print "</form>";
	print "<p><a href=\"index.php\"> Вернуться к списку
	кинозалов </a>";
	?>
</body>
</html>