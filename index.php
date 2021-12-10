<?php
/**
 * 1. Установить программное обеспечение: веб-сервер, базу данных, интерпретатор, текстовый редактор. Проверить, что все работает правильно.
 * сделано даже лучше - докер всему голова
 * 2. Выполнить примеры из методички и разобраться, как это работает.
 *    Ды там разбирать нечего
 * 3. Объяснить, как работает данный код:
 * $a = 5;
 * $b = '05';
 * var_dump($a == $b);         // Почему true? - приведение типов к числу при сравнении
 * var_dump((int)'012345');     // Почему 12345? - приведение типов к числу отрежет ноль слева
 * var_dump((float)123.0 == (int)123.0); // Почему false? - разные типы данных указаны жестко
 * var_dump((int)0 === (int)'hello, world'); // Почему true? приведение строки к числу не удалось => false , (int) false - это 0, оттого и равно
 * 4. Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP. Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных.
 *    Вывод после закрывающего php тэга
 */
$title = 'Главная страница';
$h1 = '<span class="black">THE BRAND</span><br>OF LUXERIOUS <span class="recolored">FASHION</span>';
/**
 * 5. *Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2. Дополнительные переменные использовать нельзя.
 */
[$a, $b] = [1, 2];
[$a, $b] = [$b, $a];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<!-- <base href="/"> -->

	<title><?= $title; ?></title>
	<meta name="description" content="Sinstranger devs"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

	<link rel="stylesheet" href="assets/css/main.min.css"/>
</head>

<body>
<header class="header">
	<div class="wrapper">
		<div class="header__left">
			<a href="/" class="interaction interaction-to-right search"><img src="assets/images/dist/icons/logo.svg" alt="Site-search"/></a>
			<a href="#" class="interaction interaction-to-right account"><img src="assets/images/dist/icons/search-leanse.svg" alt="Account"/></a>
		</div>
		<div class="header__right">
			<label for="main-menu-trigger" class="interaction interaction-to-left menu-trigger"><img src="assets/images/dist/icons/menu-hamburger.svg" alt="menu-trigger"/></label>
			<a href="/registration.html" class="interaction interaction-to-left logo"><img src="assets/images/dist/icons/login-ico.svg" alt="Login"/></a>
			<a href="/cart.html" class="interaction interaction-to-left mini-cart">
				<img src="assets/images/dist/icons/shop-cart-ico.svg" alt="mini-cart"/>
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
				<span class="main-menu__cat"><a href="#" class="main-menu__link">MAN</a></span>
				<ul class="main-menu__sub">
					<li class="main-menu__item"><a href="#" class="main-menu__link">Accessories</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Bags</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Denim</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">T-Shirts</a></li>
				</ul>
			</li>
			<li class="main-menu__item">
				<span class="main-menu__cat"><a href="#" class="main-menu__link">WOMAN</a></span>
				<ul class="main-menu__sub">
					<li class="main-menu__item"><a href="#" class="main-menu__link">Accessories</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Jackets & Coats</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Polos</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">T-Shirts</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Shirts</a></li>
				</ul>
			</li>
			<li class="main-menu__item">
				<span class="main-menu__cat"><a href="#" class="main-menu__link">KIDS</a></span>
				<ul class="main-menu__sub">
					<li class="main-menu__item"><a href="#" class="main-menu__link">Accessories</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Jackets & Coats</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Polos</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">T-Shirts</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Shirts</a></li>
					<li class="main-menu__item"><a href="#" class="main-menu__link">Bags</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<main class="main">
	<section class="main-promo">
		<div class="wrapper main-promo__content">
			<h1 class="main-promo__title"><?= $h1; ?></h1>
		</div>
	</section>
	<div class="wrapper">
		<section class="caregories">
			<a href="/catalog.html" class="caregories__item" style="background: url(assets/images/dist/categories/for-woman.png) center/cover no-repeat;">
				<p class="caregories__event">30% OFF</p>
				<p class="caregories__title recolored">FOR WOMEN</p>
			</a>
			<a href="/catalog.html" class="caregories__item" style="background: url(assets/images/dist/categories/for-men.png) center/cover no-repeat;">
				<p class="caregories__event">HOT DEAL</p>
				<p class="caregories__title recolored">FOR MEN</p>
			</a>
			<a href="/catalog.html" class="caregories__item" style="background: url(assets/images/dist/categories/for-kids.png) center/cover no-repeat;">
				<p class="caregories__event">NEW ARRIVALS</p>
				<p class="caregories__title recolored">FOR KIDS</p>
			</a>
			<a href="/catalog.html" class="caregories__item" style="background: url(assets/images/dist/categories/accesories.png) center/cover no-repeat;">
				<p class="caregories__event">LUXIROUS & TRENDY</p>
				<p class="caregories__title recolored">ACCESORIES</p>
			</a>
		</section>
	</div>
	<section class="catalog wrapper">
		<h2 class="section-heading">Fetured Items</h2>
		<p class="section-annotation">Shop for items based on what we featured in this week</p>
		<!-- 2 ряд специально не полный, чтобы понять замысел позиционирования -->
		<div class="catalog-list">
			<div class="catalog__item">
				<p class="catalog__cart"><img src="assets/images/dist/product-example.png" alt="#" class="catalog__image"/>
					<span class="add-to-cart">
            <a href="#" class="add-to-cart__button">Add to Cart</a>
         </span>
				</p>
				<div class="catalog__caption">
					<a href="#" class="catalog__title">ELLERY X M'O CAPSULE</a>
					<p class="catalog__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</p>
					<p class="catalog__price recolored">$52.00</p>
				</div>
			</div>
			<div class="catalog__item">
				<p class="catalog__cart"><img src="assets/images/dist/product-example.png" alt="#" class="catalog__image"/>
					<span class="add-to-cart">
            <a href="#" class="add-to-cart__button">Add to Cart</a>
         </span>
				</p>
				<div class="catalog__caption">
					<a href="#" class="catalog__title">ELLERY X M'O CAPSULE</a>
					<p class="catalog__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</p>
					<p class="catalog__price recolored">$52.00</p>
				</div>
			</div>
			<div class="catalog__item">
				<p class="catalog__cart"><img src="assets/images/dist/product-example.png" alt="#" class="catalog__image"/>
					<span class="add-to-cart">
            <a href="#" class="add-to-cart__button">Add to Cart</a>
         </span>
				</p>
				<div class="catalog__caption">
					<a href="#" class="catalog__title">ELLERY X M'O CAPSULE</a>
					<p class="catalog__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</p>
					<p class="catalog__price recolored">$52.00</p>
				</div>
			</div>
			<div class="catalog__item">
				<p class="catalog__cart"><img src="assets/images/dist/product-example.png" alt="#" class="catalog__image"/>
					<span class="add-to-cart">
            <a href="#" class="add-to-cart__button">Add to Cart</a>
         </span>
				</p>
				<div class="catalog__caption">
					<a href="#" class="catalog__title">ELLERY X M'O CAPSULE</a>
					<p class="catalog__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</p>
					<p class="catalog__price recolored">$52.00</p>
				</div>
			</div>
			<div class="catalog__item">
				<p class="catalog__cart"><img src="assets/images/dist/product-example.png" alt="#" class="catalog__image"/>
					<span class="add-to-cart">
            <a href="#" class="add-to-cart__button">Add to Cart</a>
         </span>
				</p>
				<div class="catalog__caption">
					<a href="#" class="catalog__title">ELLERY X M'O CAPSULE</a>
					<p class="catalog__description">Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.</p>
					<p class="catalog__price recolored">$52.00</p>
				</div>
			</div>
		</div>
		<!-- Для центрирования кнопки употреблен text-align: canter у родителя, на сколько такое решение хорошее? -->
		<a href="/catalog.html" class="catalog__button">Browse All Product</a>
	</section>

	<section class="our-advantages">
		<div class="our-advantages__list wrapper">
			<div class="our-advantages__item">
				<img src="assets/images/dist/infographic/delivery.svg" alt="#" class="our-advantages__image"/>
				<p class="our-advantages__title">Free Delivery</p>
				<div class="our-advantages__caption">Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.</div>
			</div>
			<div class="our-advantages__item">
				<img src="assets/images/dist/infographic/interest.svg" alt="#" class="our-advantages__image"/>
				<p class="our-advantages__title">Sales & discounts</p>
				<div class="our-advantages__caption">Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.</div>
			</div>
			<div class="our-advantages__item">
				<img src="assets/images/dist/infographic/crown.svg" alt="#" class="our-advantages__image"/>
				<p class="our-advantages__title">Quality assurance</p>
				<div class="our-advantages__caption">Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.</div>
			</div>
		</div>
	</section>
	<section class="subscribe pad-centerier">
		<div class="subscribe__hello subscribe__item">
			<img src="assets/images/dist/face.png" alt="#" class="subscribe__image">
			<p class="subscribe__caption">“Vestibulum quis porttitor dui! Quisque viverra nunc mi, a pulvinar purus condimentum“</p>
		</div>
		<div class="subscribe__item subscribe__form">
			<form method="POST">
				<h3 class="subscribe__title">SUBSCRIBE</h3>
				<p class="subscribe__caption subscribe__caption--form">FOR OUR NEWLETTER AND PROMOTION</p>
				<fieldset class="subscribe__fieldset">
					<!-- Проверяем по RFC 5322  (?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])-->
					<input type="email" placeholder="Enter Your Email" required>
					<input type="submit" value="Subscribe"></fieldset>
			</form>
		</div>
	</section>
</main>
<footer class="footer pad-centerier">
	<div class="copiryght">&copy; <?=date("Y");?> Brand All Rights Reserved.</div>
	<div class="footer__socials">
		<a href="#" class="footer__icon"><img src="assets/images/dist/icons/facebook-ico.svg" alt="#"><img src="assets/images/dist/icons/facebook-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="assets/images/dist/icons/twitter-ico.svg" alt="#"><img src="assets/images/dist/icons/twitter-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="assets/images/dist/icons/pinterest-ico.svg" alt="#"><img src="assets/images/dist/icons/pinterest-ico-white.svg" alt="#"></a>
		<a href="#" class="footer__icon"><img src="assets/images/dist/icons/instagram-ico.svg" alt="#"><img src="assets/images/dist/icons/instagram-ico-white.svg" alt="#"></a>
	</div>
</footer>
<script src="assets/js/app.min.js"></script>
</body>
</html>
