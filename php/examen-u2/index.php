<?php
require_once("credentials.php");

$sql = "SELECT * FROM books_editorial_view";
$res = $conn->query($sql);
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Libros</title>
</head>

<body>
	<h1>Libros</h1>
	<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Autor</th>
				<th>Páginas</th>
				<th>Tema</th>
				<th>Editorial</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row = $res->fetch_assoc()) {
				echo '<tr>';
				echo '<td>' . $row['book_name'] . '</td>';
				echo '<td>' . $row['author'] . '</td>';
				echo '<td>' . $row['pages'] . '</td>';
				echo '<td>' . $row['topic'] . '</td>';
				echo '<td>' . $row['editorial_name'] . '</td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
	<h1>Editoriales</h1>
	<table>
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM editorial";
			$res = $conn->query($sql);
			while ($row = $res->fetch_assoc()) {
				echo '<tr>';
				echo '<td>' . $row['editorial_name'] . '</td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
</body>

</html>
