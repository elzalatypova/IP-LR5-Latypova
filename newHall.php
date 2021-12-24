<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Латыпова Эльза</title>
</head>
<body>
	<?php include ("checkSession.php"); ?>
	<H2>Регистрация зала:</H2>
	<form action="save_newHall.php" metod="get">
	Название зала: <input name="name_hall" rows="4" cols="40">
	<br>Категория: <input name="category" rows="4" cols="40">
	<p><input name="add" type="submit" value="Добавить">
	<input name="b2" type="reset" value="Очистить"></p>
	</form>
	<p>
	<a href="index.php"> Вернуться к списку кинозал </a>
</body>
</html>