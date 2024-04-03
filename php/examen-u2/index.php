<?php
require_once("credentials.php");

$sql = "SELECT * FROM books_editorial_view";
$res = $conn->query($sql);
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Libros</title>
</head>

<body>
	<a href="add_book.php">Alta de libros</a>
	<a href="add_editorial.php">Alta de editorial</a>
	<h1>Libros</h1>
	<table class="table table-hover">
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
	<table class="table table-hover">
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
