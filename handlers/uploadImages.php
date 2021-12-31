<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/connections/mariaDbConnection.php';
header("Content-Type:application/json");
function handleUploadImages(): string
{
	global $mariaDbConnection;
	$publicDirPrefix = '/public';
	$photoGalleryPath = "/assets/images/dist/photogallery/";
	$photoGalleryPathFs = "{$_SERVER['DOCUMENT_ROOT']}{$publicDirPrefix}{$photoGalleryPath}";
	$toFrontendAnswer = [];
	if (isset($_FILES["uploaded-images"]) && !empty($_FILES["uploaded-images"])) {
		foreach ($_FILES["uploaded-images"]['name'] as $imageOrder => &$imageName) {
			$addImageToDatabase = sprintf("INSERT INTO photogallery (path) VALUES ('%s')", mysqli_real_escape_string($mariaDbConnection, "{$photoGalleryPath}{$imageName}"));
			if (!$_FILES["uploaded-images"]['error'][$imageOrder] && mysqli_query($mariaDbConnection, $addImageToDatabase) && move_uploaded_file($_FILES["uploaded-images"]['tmp_name'][$imageOrder], "{$photoGalleryPathFs}{$imageName}")) {
				$toFrontendAnswer[] = ['error' => false, 'uploadedName' => "$imageName", 'imgPath' => "{$photoGalleryPath}{$imageName}", 'id' => mysqli_insert_id($mariaDbConnection)];
			} else {
				$toFrontendAnswer[] = ['error' => true, 'uploadedName' => $imageName];
			}
		}
	} else {
		$toFrontendAnswer = false;
	}
	return json_encode($toFrontendAnswer);
}

function handleOpenImage()
{
	global $mariaDbConnection;
	$response = json_decode(file_get_contents('php://input'), true);
	if (mysqli_query($mariaDbConnection, sprintf("UPDATE photogallery SET opened_count=%d WHERE id=%d", mysqli_real_escape_string($mariaDbConnection, $response['opened-count']), mysqli_real_escape_string($mariaDbConnection, $response['database-id'])))) {
		return true;
	}
	return null;
}

echo isset($_POST['photogallery_upload']) ? handleUploadImages() : handleOpenImage();
mysqli_close($mariaDbConnection);
