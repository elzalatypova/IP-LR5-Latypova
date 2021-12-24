<?

header('Content-Type: application/vnd.ms-excel; format=attachment;');
header('Content-Disposition: attachment; filename= Лаба4.xls');
header('Expires: Mon, 18 Jul 1998 01:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

	define ("HOST", "localhost");
	define ("USER", "f0593243_films");
	define ("PASS", "123");
	define ("DB", "f0593243_films"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");

?>

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<table>

<tr>

<th>№ п/п</th> 
<th>Название фильма</th> 
<th>жанр</th> 
<th>год выпуска</th> 
<th>% название зала</th> 
<th>категория</th> 
<th>дата и время начала показа</th> 
<th>количество свободных мест</th>
</tr>
<?php 
$sessions=$mysqli->query("SELECT begin_data_time, count_free_places, id_film, id_hall
	FROM sessions"); 

$count= 0;
while ($row=mysqli_fetch_array($sessions)) {
	$films = $mysqli->query("SELECT name_film, genre, year FROM film WHERE id_film =" . $row['id_film']);
	$film = mysqli_fetch_array($films);
	$halls = $mysqli->query("SELECT name_hall, category FROM halls WHERE id_hall =". $row['id_hall']);
	$hall = mysqli_fetch_array($halls);

	
	$count++;
	

	echo "<tr>";
	echo "<td>". $count ."</td>";
	echo "<td>". $film['name_film'] ."</td>";
	echo "<td>". $film['genre'] ."</td>";
	echo "<td>". $film['year'] ."</td>";
	echo "<td>". $hall['name_hall'] ."</td>";
	echo "<td>". $hall['category'] ."</td>";
	echo "<td>". $row['begin_data_time'] ."</td>";
	echo "<td>". $row['count_free_places'] ."</td>";
	echo "</tr>";
};
 ?>


</table>