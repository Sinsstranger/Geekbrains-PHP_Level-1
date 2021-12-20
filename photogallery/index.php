<?php
$photogalleryData = scandir("{$_SERVER['DOCUMENT_ROOT']}/assets/images/dist/photogallery/");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
	<link rel="stylesheet" href="/assets/css/photogallery.css">
	<title>Photogallery</title>
</head>
<body>
<form action="/handlers/uploadImages.php" class="add-photo-form" method="post" enctype="multipart/form-data">
	<input name="uploaded-images[]" class="add-photo-form__load" type="file" value="Выберите файлы" accept="image/*" multiple>
	<button class="add-photo-form__send" type="submit">Загрузить</button>
</form>
<div class="fancy-gallery">
	<?php foreach ($photogalleryData as &$image): ?>
		<?php if (!in_array($image, ['.', '..']) && stripos(mime_content_type("{$_SERVER['DOCUMENT_ROOT']}/assets/images/dist/photogallery/{$image}"), 'image') !== false): ?>
		  <a href="<?="/assets/images/dist/photogallery/{$image}"?>" class="fancy-gallery__item" data-fancybox="gallery"><img src="<?="/assets/images/dist/photogallery/{$image}"?>" alt="#"></a>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<script type="module" src="/assets/js/photogallery.js"></script>
</body>
</html>
