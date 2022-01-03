<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/connections/mariaDbConnection.php';
$photos_res = mysqli_query($mariaDbConnection, "SELECT * FROM photogallery ORDER BY `opened_count` DESC;");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
	<link rel="stylesheet" href="/assets/css/main.min.css"/>
	<link rel="stylesheet" href="/assets/css/photogallery.css">
	<title>Photogallery</title>
</head>
<body>
<header class="header">
	<div class="wrapper">
		<div class="header__left">
			<a href="/" class="interaction interaction-to-right search"><img src="/public/assets/images/dist/icons/logo.svg" alt="Site-search"/></a>
			<a href="#" class="interaction interaction-to-right account"><img src="/public/assets/images/dist/icons/search-leanse.svg" alt="Account"/></a>
		</div>
		<div class="header__right">
			<label for="main-menu-trigger" class="interaction interaction-to-left menu-trigger"><img src="/public/assets/images/dist/icons/menu-hamburger.svg" alt="menu-trigger"/></label>
			<a href="/registration.html" class="interaction interaction-to-left logo"><img src="/public/assets/images/dist/icons/login-ico.svg" alt="Login"/></a>
			<a href="/cart.html" class="interaction interaction-to-left mini-cart">
				<img src="/public/assets/images/dist/icons/shop-cart-ico.svg" alt="mini-cart"/>
				<span class="mini-cart__goods-count">5</span>
			</a>
		</div>
	</div>
</header>
<nav class="main-menu">
	<input type="checkbox" id="main-menu-trigger">
	<div class="main-menu__wrapper">
		<label for="main-menu-trigger" class="main-menu__close"></label>
		<p class="main-menu__title">Menu</p>
		<ul class="main-menu__list">
			<li class="main-menu__item">
				<span class="main-menu__cat"><a href="/photogallery/" class="main-menu__link">Фотогаллерея</a></span>
				<span class="main-menu__cat"><a href="/reviews/" class="main-menu__link">Отзывы</a></span>
			</li>
		</ul>
	</div>
</nav>
<main class="main">
	<form action="/handlers/uploadImages.php" class="add-photo-form" method="post" enctype="multipart/form-data">
		<input type="text" hidden value="true" name="photogallery_upload">
		<input name="uploaded-images[]" class="add-photo-form__load" type="file" value="Выберите файлы" accept="image/*" multiple>
		<button class="add-photo-form__send" type="submit">Загрузить</button>
	</form>
	<div class="fancy-gallery">
		 <?php while ($photogalleryData = mysqli_fetch_assoc($photos_res)): ?>
		  <a href="<?= $photogalleryData['path']; ?>" class="fancy-gallery__item" data-db-id="<?= $photogalleryData['id'] ?>" data-fancybox="gallery" data-opened-count="<?= $photogalleryData['opened_count'] ?>"<?= $photogalleryData['opened_count'] ? " data-caption=\"Просмотров: {$photogalleryData['opened_count']}\"" : null; ?>><img src="<?= $photogalleryData['path']; ?>" alt="#"></a>
		 <?php endwhile;
		 mysqli_free_result($photos_res); ?>
	</div>
</main>
<footer class="footer pad-centerier">
	<div class="copiryght">&copy; <?= date("Y"); ?> Brand All Rights Reserved.</div>
	<div class="footer__socials">
		<a href="#" class="footer__icon"><img src="/assets/images/dist/icons/facebook-ico.svg" alt="#"><img src="/public/assets/images/dist/icons/facebook-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/assets/images/dist/icons/twitter-ico.svg" alt="#"><img src="/public/assets/images/dist/icons/twitter-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/assets/images/dist/icons/pinterest-ico.svg" alt="#"><img src="/public/assets/images/dist/icons/pinterest-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/assets/images/dist/icons/instagram-ico.svg" alt="#"><img src="/public/assets/images/dist/icons/instagram-ico-white.svg" alt="#"></a>
	</div>
</footer>
<script src="/assets/js/app.min.js"></script>
<script type="module" src="/assets/js/photogallery.js"></script>
</body>
</html>
