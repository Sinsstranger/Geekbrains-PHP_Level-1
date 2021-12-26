<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/connections/mariaDbConnection.php';
$photogalleryData = scandir("{$_SERVER['DOCUMENT_ROOT']}/public/assets/images/dist/photogallery/");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
	<link rel="stylesheet" href="/public/assets/css/main.min.css"/>
	<link rel="stylesheet" href="/public/assets/css/photogallery.css">
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
		</ul>
	</div>
</nav>
<main class="main">
<form action="/handlers/uploadImages.php" class="add-photo-form" method="post" enctype="multipart/form-data">
	<input name="uploaded-images[]" class="add-photo-form__load" type="file" value="Выберите файлы" accept="image/*" multiple>
	<button class="add-photo-form__send" type="submit">Загрузить</button>
</form>
<div class="fancy-gallery">
	<?php foreach ($photogalleryData as &$image): ?>
		<?php if (!in_array($image, ['.', '..']) && stripos(mime_content_type("{$_SERVER['DOCUMENT_ROOT']}/public/assets/images/dist/photogallery/{$image}"), 'image') !== false): ?>
		  <a href="<?= "/assets/images/dist/photogallery/{$image}" ?>" class="fancy-gallery__item" data-fancybox="gallery"><img src="<?= "/assets/images/dist/photogallery/{$image}" ?>" alt="#"></a>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
</main>
<footer class="footer pad-centerier">
	<div class="copiryght">&copy; <?= date("Y"); ?> Brand All Rights Reserved.</div>
	<div class="footer__socials">
		<a href="#" class="footer__icon"><img src="/public/assets/images/dist/icons/facebook-ico.svg" alt="#"><img src="/public/assets/images/dist/icons/facebook-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/public/assets/images/dist/icons/twitter-ico.svg" alt="#"><img src="/public/assets/images/dist/icons/twitter-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/public/assets/images/dist/icons/pinterest-ico.svg" alt="#"><img src="/public/assets/images/dist/icons/pinterest-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/public/assets/images/dist/icons/instagram-ico.svg" alt="#"><img src="/public/assets/images/dist/icons/instagram-ico-white.svg" alt="#"></a>
	</div>
</footer>
<script src="/public/assets/js/app.min.js"></script>
<script type="module" src="/public/assets/js/photogallery.js"></script>
</body>
</html>
