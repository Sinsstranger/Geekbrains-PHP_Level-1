<?php
http_response_code(102);
require_once $_SERVER['DOCUMENT_ROOT'] . '/connections/mariaDbConnection.php';
header('Content-type: application/json');
$success = false;
if (mysqli_query($mariaDbConnection,
	"INSERT INTO `reviews` (`author`, `author_email`, `body`, `date`) VALUES ('" . $_POST['author'] . "', '" . $_POST['email'] . "', '" . $_POST['review-body'] . "', now());")) {
	http_response_code(201);
	$success = true;
} else {
	http_response_code(503);
}
$result = ['success' => $success, 'author' => $_POST['author'], 'email' => $_POST['email'], 'review-body' => $_POST['review-body'], 'timestamp' => mysqli_fetch_assoc(mysqli_query($mariaDbConnection, "SELECT `date` FROM `reviews` WHERE `id` = '" . mysqli_insert_id($mariaDbConnection) . "'"))];
echo json_encode($result);