<?php
if (isset($_POST['colors'])) {
	foreach($_POST['colors'] as $checkbox) {
		echo $checkbox;
	}
}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		<form action="demo_cb.php" method="post">
			<input type="checkbox" name="colors[]" value="1" id="color_red" />
			<label for="color_red">Red</label>

			<input type="checkbox" name="colors[]" value="2" id="color_green" />
			<label for="color_red">Green</label>

			<input type="checkbox" name="colors[]" value="3" id="color_blue" />
			<label for="color_red">Blue</label>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>
