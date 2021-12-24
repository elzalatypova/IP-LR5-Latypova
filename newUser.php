<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Латыпова Эльза</title>
</head>
<body>
	<?php 
	
	include ("checkSession.php") ?>
	<H2>Регистрация на сайте:</H2>
	<form action="save_newUser.php" metod="get">
	 Логин: <input name="name" size="50" type="text">
	<br>пароль: <input name="password" size="20" type="password">
	<br>
	<select name="type">
		<option value="1">Оператор</option>
		<option value="2">Администратор</option>
	</select>
	<p><input name="add" type="submit" value="Добавить">
	<input name="b2" type="reset" value="Очистить"></p>
	</form>
	<p>
	<a href="index.php"> Вернуться к списку пользователей </a>
</body>
</html>