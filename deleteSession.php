<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Латыпова Эльза</title>
</head>
<body>
	<?php
	define ("HOST", "localhost");
	define ("USER", "f0593243_films");
	define ("PASS", "123");
	define ("DB", "f0593243_films"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");
	 $mysqli->query('SET NAMES UTF-8');
	 $zapros="DELETE FROM sessions WHERE id_session=" . $_GET['id_session'];
	 $mysqli->query($zapros);
	 header("Location: index.php");
	 exit;
	?>

</body>
</html>