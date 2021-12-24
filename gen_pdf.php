<?php 
	require_once('tcpdf_min/tcpdf.php');
	ob_clean();

	define ("HOST", "localhost");
	define ("USER", "f0593243_films");
	define ("PASS", "123");
	define ("DB", "f0593243_films"); // установление соединения с сервером
	 // подключение к базе данных:
	 $mysqli = mysqli_connect(HOST, USER, PASS, DB) or die ("Невозможно
	подключиться к серверу");

	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
// Устанавливаем информацию о документе
$pdf->SetAuthor('Имя автора');
$pdf->SetTitle('Название документа');
// Устанавливаем данные заголовка по умолчанию
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// Устанавливаем верхний и нижний колонтитулы
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// Устанавливаем моноширинный шрифт по умолчанию
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// Устанавливаем отступы
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// Устанавливаем автоматические разрывы страниц
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//указываем путь к файлу
$font = 'Roboto-Medium.ttf';
// преобразуем шрифт
$fontname = TCPDF_FONTS::addTTFfont($font, 'TrueTypeUnicode', '', 96);
$pdf->SetFont($fontname, '', 14, '', true);
// Добавляем страницу
$pdf->AddPage();

$sessions=$mysqli->query("SELECT begin_data_time, count_free_places, id_film, id_hall
	FROM sessions"); 
$rows = "";

$count= 0;
while ($row=mysqli_fetch_array($sessions)) {
	$films = $mysqli->query("SELECT name_film, genre, year FROM film WHERE id_film =" . $row['id_film']);
	$film = mysqli_fetch_array($films);
	$halls = $mysqli->query("SELECT name_hall, category FROM halls WHERE id_hall =". $row['id_hall']);
	$hall = mysqli_fetch_array($halls);

	$count++;
	$rows = $rows. "<tr>";
	$rows = $rows. "<td>". $count ."</td>";
	$rows = $rows. "<td>". $film['name_film'] ."</td>";
	$rows = $rows. "<td>". $film['genre'] ."</td>";
	$rows = $rows. "<td>". $film['year'] ."</td>";
	$rows = $rows. "<td>". $hall['name_hall'] ."</td>";
	$rows = $rows. "<td>". $hall['category'] ."</td>";
	$rows = $rows. "<td>". $row['begin_data_time'] ."</td>";
	$rows = $rows. "<td>". $row['count_free_places'] ."</td>";
	$rows = $rows. "</tr>";
};

// Устанавливаем текст
$html = "
<h2> Операционные системы </h2>
	<table>
		<tr>
			<td>№ п/п</td> <td>Название фильма</td> <td>жанр</td> <td>год выпуска</td> <td>% название зала</td> <td>категория</td> <td>дата и время начала показа</td> <td>количество свободных мест</td>
		</tr>
	
". $rows ."</table>";
// Выводим текст с помощью writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Закрываем и выводим PDF документ
$pdf->Output('document.pdf', 'I');
?>

	
 ?>