<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/connections/mariaDbConnection.php';
$reviews = mysqli_fetch_all(mysqli_query($mariaDbConnection, "SELECT * FROM `reviews`;"), MYSQLI_ASSOC);
$renderReviews = function () use ($reviews) { ?>
	<?php if (count($reviews)): ?>
		<?php foreach ($reviews as &$review): ?>
			<div class="review__item">
				<div class="review__item-author"><?= $review['author'] ?></div>
				<div class="review__item-mail"><?= $review['author_email'] ?></div>
				<div class="review__item-body"><?= $review['body'] ?></div>
				<div class="review__item-time"><?= date("d.m.Y H:i:s", strtotime($review['date'])) ?></div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
<?php }; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<!-- <base href="/"> -->

	<title>Отзывы</title>
	<meta name="description" content="Sinstranger devs"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

	<link rel="stylesheet" href="/assets/css/main.min.css"/>
	<link rel="stylesheet" href="/assets/css/reviews.css">
</head>

<body>
<header class="header">
	<div class="wrapper">
		<div class="header__left">
			<a href="/" class="interaction interaction-to-right search"><img src="/assets/images/dist/icons/logo.svg" alt="Site-search"/></a>
			<a href="#" class="interaction interaction-to-right account"><img src="/assets/images/dist/icons/search-leanse.svg" alt="Account"/></a>
		</div>
		<div class="header__right">
			<label for="main-menu-trigger" class="interaction interaction-to-left menu-trigger"><img src="/assets/images/dist/icons/menu-hamburger.svg" alt="menu-trigger"/></label>
			<a href="/registration/" class="interaction interaction-to-left logo"><img src="/assets/images/dist/icons/login-ico.svg" alt="Login"/></a>
			<a href="/cart/" class="interaction interaction-to-left mini-cart">
				<img src="/assets/images/dist/icons/shop-cart-ico.svg" alt="mini-cart"/>
				<span class="mini-cart__goods-count">5</span>
			</a>
		</div>
	</div>
</header>
<nav class="main-menu">
	<input type="checkbox" id="main-menu-trigger">
	<div class="main-menu__wrapper">
		<label for="main-menu-trigger" class="main-menu__close"></label>
		<p class="main-menu__title">Меню</p>
		<ul class="main-menu__list">
			<li class="main-menu__item">
				<span class="main-menu__cat"><a href="/photogallery/" class="main-menu__link">Фотогаллерея</a></span>
				<span class="main-menu__cat"><a href="/reviews/" class="main-menu__link">Отзывы</a></span>
			</li>
		</ul>
	</div>
</nav>
<main class="main review-wrapper">
	<div class="review-field">
		 <?php $renderReviews(); ?>
	</div>
	<form action="/handlers/addReview.php" method="post" class="add-review">
		<label class="add-review__label"><input type="text" name="author" placeholder="Имя"></label>
		<label class="add-review__label"><input type="email" name="email" placeholder="Почта"></label>
		<label class="add-review__label"><textarea name="review-body" rows="5" placeholder="Текст отзыва"></textarea></label>
		<button class="add-review__submit" type="submit">Разместить отзыв</button>
	</form>
</main>
<footer class="footer pad-centerier">
	<div class="copiryght">&copy; <?= date("Y"); ?> Brand All Rights Reserved.</div>
	<div class="footer__socials">
		<a href="#" class="footer__icon"><img src="/assets/images/dist/icons/facebook-ico.svg" alt="#"><img src="/assets/images/dist/icons/facebook-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/assets/images/dist/icons/twitter-ico.svg" alt="#"><img src="/assets/images/dist/icons/twitter-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/assets/images/dist/icons/pinterest-ico.svg" alt="#"><img src="/assets/images/dist/icons/pinterest-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="/assets/images/dist/icons/instagram-ico.svg" alt="#"><img src="/assets/images/dist/icons/instagram-ico-white.svg" alt="#"></a>
	</div>
</footer>
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/reviews.js"></script>
</body>
</html>