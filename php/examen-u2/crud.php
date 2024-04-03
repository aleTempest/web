<?php
require_once 'credentials.php';

if (isset($_POST['new_book'])) {
	$author = $_POST['author'];
	$book_name = $_POST['book_name'];
	$topic = $_POST['topic'];
	$pages = $_POST['pages'];
	$editorial = $_POST['editorial'];
	$sql = "INSERT INTO books (id_editorial, book_name, pages, topic, author) VALUES ($editorial, '$book_name', $pages, '$topic', '$author')";
	$conn->query($sql);
	header('Location: index.php');
}

if (isset($_POST['new_editorial'])) {
	$editorial_name = $_POST['editorial_name'];
	$sql = "INSERT INTO editorial (editorial_name) VALUES ('$editorial_name')";
	$conn->query($sql);
	header('Location: index.php');
}
