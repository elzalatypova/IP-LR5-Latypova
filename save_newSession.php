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
	 // Подключение к базе данных:
	define ("HOST", "localhost");
	define ("USER", "f0593243_films");
	define ("PASS", "123");
	define ("DB", "f0593243_films"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8'); // Тип кодировки
	 // Строка запроса на добавление записи в таблицу:
	 $sql_add = "INSERT INTO sessions SET begin_data_time='".$_GET['begin_data_time'].
	"', count_free_places='".$_GET['count_free_places']."', count_busy_places='".$_GET['count_busy_places']."', id_film='".$_GET['id_film']."', id_hall='".$_GET['id_hall']."'";
	 $mysqli->query($sql_add); // Выполнение запроса
	 if (mysqli_affected_rows($mysqli)>0) // если нет ошибок при выполнении запроса
	 { print "<p>Спасибо, вы зарегистрировали киносеанс в базе данных.";
	 print "<p><a href=\"index.php\"> Вернуться к списку
	киносеансов </a>"; }
	 else { print "Ошибка сохранения. <a href=\"index.php\">
	Вернуться к списку киносеансов </a>"; }
	?>
</body>
</html>