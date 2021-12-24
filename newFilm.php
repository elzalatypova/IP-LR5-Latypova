<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Латыпова Эльза</title>
</head>
<body>
	<?php include ("checkSession.php"); ?>
	<H2>Регистрация Фильма:</H2>
	<form action="save_newFilm.php" metod="get">
	 Название: <input name="name_film" size="50" type="text">
	<br>Жанр: <input name="genre" size="20" type="text">
	<br>Режисёр: <input name="director" size="20" type="text">
	<br>Год выпуска: <input name="year" size="30" type="date">
	<br>Кассовые сборы: <input name="fees" size="30" type="text">
	<p><input name="add" type="submit" value="Добавить">
	<input name="b2" type="reset" value="Очистить"></p>
	</form>
	<p>
	<a href="index.php"> Вернуться к списку Фильмов </a>
</body>
</html>