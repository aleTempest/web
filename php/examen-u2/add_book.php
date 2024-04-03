<?php
require_once 'credentials.php';

$sql = "SELECT * FROM editorial";
$res = $conn->query($sql);
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Document</title>
</head>

<body>
	<a href="index.php"></a>
	<form action="crud.php" method="post">
		<div class="mb-3">
			<label for="book_name">Nombre del libro</label>
			<input type="text" name="book_name">
		</div>
		<div class="mb-3">
			<label for="author">Autor</label>
			<input type="text" name="author">
		</div>
		<div class="mb-3">
			<label for="pages">Páginas</label>
			<input type="text" name="pages">
		</div>
		<div class="mb-3">
			<label for="topic">Tema</label>
			<input type="text" name="topic">
		</div>
		<div class="mb-3">
			<label for="editorial">Editorial</label>
			<select name="editorial" id="">
				<?php
				$sql = "SELECT * FROM editorial";
				$res = $conn->query($sql);
				while ($row = $res->fetch_assoc()) {
					echo '<option value="' . $row['id_editorial'] . '">' . $row['editorial_name'] . '</option>';
				}
				?>
			</select>
		</div>
		<button name="new_book" type="submit">Guardar</button>
	</form>
</body>

</html>
