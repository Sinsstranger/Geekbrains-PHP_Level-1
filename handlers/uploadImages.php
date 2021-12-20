<?php
function handleImages()
{
	$photoGalleryPath = "/assets/images/dist/photogallery/";
	$photoGalleryPathFs = "{$_SERVER['DOCUMENT_ROOT']}{$photoGalleryPath}";
	$toFrontendAnswer = [];
	if (isset($_FILES["uploaded-images"]) && !empty($_FILES["uploaded-images"])) {
		foreach ($_FILES["uploaded-images"]['name'] as $imageOrder => &$imageName) {
			if (!$_FILES["uploaded-images"]['error'][$imageOrder]) {
				move_uploaded_file($_FILES["uploaded-images"]['tmp_name'][$imageOrder], "{$photoGalleryPathFs}{$imageName}");
				$toFrontendAnswer[] = ['error' => false, 'uploadedName' => "$imageName", 'imgPath' => "{$photoGalleryPath}$imageName"];
			} else {
				$toFrontendAnswer[] = ['error' => true, 'uploadedName' => $imageName];
			}
		}
	} else $toFrontendAnswer = false;
	return json_encode($toFrontendAnswer);
}

echo handleImages();