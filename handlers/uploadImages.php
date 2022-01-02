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
			$addImageToDatabase = "INSERT INTO `photogallery` (`path`) VALUES ('" . $photoGalleryPath . $imageName . "');";
			if (!$_FILES["uploaded-images"]['error'][$imageOrder] && mysqli_query($mariaDbConnection, $addImageToDatabase) && move_uploaded_file($_FILES["uploaded-images"]['tmp_name'][$imageOrder], "{$photoGalleryPathFs}{$imageName}")) {
				http_response_code(201);
				$toFrontendAnswer[] = ['error' => false, 'uploadedName' => "$imageName", 'imgPath' => "{$photoGalleryPath}{$imageName}", 'id' => mysqli_insert_id($mariaDbConnection)];
			} else {
				http_response_code(501);
				$toFrontendAnswer[] = ['error' => true, 'uploadedName' => $imageName];
			}
		}
	} else {
		http_response_code(501);
		$toFrontendAnswer = false;
	}
	return json_encode($toFrontendAnswer);
}

function handleOpenImage(): ?bool
{
	global $mariaDbConnection;
	$response = json_decode(file_get_contents('php://input'), true);
	if (mysqli_query($mariaDbConnection, "UPDATE `photogallery` SET `opened_count` = '" . $response['opened-count'] . "' WHERE `id` = '" . $response['database-id'] . "';")) {
		http_response_code(200);
		return true;
	}
	http_response_code(501);
	return null;
}

echo isset($_POST['photogallery_upload']) ? handleUploadImages() : handleOpenImage();
mysqli_close($mariaDbConnection);
