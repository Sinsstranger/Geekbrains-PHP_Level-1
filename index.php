<?php
date_default_timezone_set('Europe/Moscow');
/* ============================================  Урок 1   ============================================ */
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
/* ============================================  Урок 2   ============================================ */
/**
 * 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
 * если $a и $b положительные, вывести их разность;
 * если $а и $b отрицательные, вывести их произведение;
 * если $а и $b разных знаков, вывести их сумму;
 */
function lesson_2_task1($a = 0, $b = 0)
{
	$result = null;
	if ($a >= 0 && $b >= 0) {
		$result = $a - $b;
	} elseif ($a < 0 && $b < 0) {
		$result = $a * $b;
	} elseif (!!($a || $b)) {
		$result = $a + $b;
	}
	return $result;
}

/**
 * 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15. Задание по желанию - доработайте решение и используйте рекурсивную функцию
 */
$num_lesson_2_task2 = random_int(0, 15);
function lesson_2_task2($num)
{
	return $num < 15 ? $num . ' ' . lesson_2_task2($num + 1) : $num;
}

/**
 * 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
 */
$addition = fn($a = null, $b = null) => $a + $b;
$subtraction = fn($a = null, $b = null) => $a - $b;
$multiplication = fn($a = null, $b = null) => $a * $b;
$division = fn($a = null, $b = null) => $b === 0 ? -1 : $a / $b;
/**
 * 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
 */
$mathOperation = function ($arg1, $arg2, $operation) use ($addition, $subtraction, $multiplication, $division) {
	switch ($operation) {
		case '+':
			return $addition($arg1, $arg2);
		case '-':
			return $subtraction($arg1, $arg2);
		case '*':
			return $multiplication($arg1, $arg2);
		case '/':
			return $division($arg1, $arg2);
		default:
			return null;
	}
};

/**
 * 5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP. Делать не нужно. Сделано в первом ДЗ!
 * 6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень. Степень int и >0
 */
function power($val, $pow)
{
	return $pow > 1 ? $val * power($val, $pow - 1) : $val;
}

/**
 * 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
 * 22 часа 15 минут
 * 21 час 43 минуты
 */
function word_variation_rus($chislo, $mnogo, $odin, $dva)
{
	$ost_10 = $chislo % 10;
	if ($ost_10 == 0 || $ost_10 >= 5 || in_array($chislo % 100, range(11, 19))) $string_txt = "$chislo $mnogo";
	else {
		if ($ost_10 == 1) $string_txt = "$chislo $odin";
		else if (in_array($ost_10, range(2, 4))) $string_txt = "$chislo $dva";
	}
	return $string_txt;
}

function local_time()
{
	[$hours, $minutes] = [getdate()['hours'], getdate()['minutes']];
	return word_variation_rus($hours, 'часов', 'час', 'часа') . ' ' . word_variation_rus($minutes, 'минут', 'минута', 'минуты');
}

/* ============================================  Урок 3   ============================================ */
/**
 * 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
 */
$lesson_3_task1 = function () {
	$result = '';
	$itterator = 0;
	while ($itterator < 100) {
		$result .= $itterator !== 0 && $itterator % 3 === 0 ? $itterator . ', ' : '';
		$itterator++;
	}
	return preg_replace('/^(:?.+?)(:?,\s)$/', '${1}', $result);
};
/**
 * 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
 * 0 – ноль.
 * 1 – нечетное число.
 * 2 – четное число.
 * 3 – нечетное число.
 * …
 * 10 – четное число.
 */
$lesson_3_task2 = function () {
	$itterator = 0;
	do {
		echo "\n{$itterator}" . ($itterator === 0 ? " - ноль" : ' - ' . ($itterator % 2 !== 0 ? "не" : null) . 'четное число');
		$itterator++;
	} while ($itterator <= 10);
};
/**
 * 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
 * Московская область:
 * Москва, Зеленоград, Клин
 * Ленинградская область:
 * Санкт-Петербург, Всеволожск, Павловск, Кронштадт
 * Рязанская область … (названия городов можно найти на maps.yandex.ru)
 * 8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К». - сразу выполняю тут
 */
function lesson_3_task3($task8Symbol = false)
{
	$stateCities = [
		'Московская область' => ['Москва', 'Зеленоград', 'Клин', 'Колхоз имени Ленина'],
		'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
		'Рязанская область' => ['Рязань', 'Касимов', 'Скопин', 'Сасово']
	];
	foreach ($stateCities as $state => &$cities) {
		echo "{$state}:\n" . implode(', ', array_filter($cities, fn($town) => $task8Symbol && mb_substr($town, 0, 1) !== $task8Symbol ? false : $town)) . PHP_EOL;
	}
}

/**
 * 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
 * Написать функцию транслитерации строк.
 * 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
 * 9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).
 */
function lesson_3_task4($input)
{
	$transliteMatrix = ["а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d",
		"е" => "e", "ё" => "yo", "ж" => "j", "з" => "z", "и" => "i",
		"й" => "i", "к" => "k", "л" => "l", "м" => "m", "н" => "n",
		"о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t",
		"у" => "y", "ф" => "f", "х" => "h", "ц" => "c", "ч" => "ch",
		"ш" => "sh", "щ" => "sh", "ы" => "i", "э" => "e", "ю" => "u",
		"я" => "ya",
		"А" => "A", "Б" => "B", "В" => "V", "Г" => "G", "Д" => "D",
		"Е" => "E", "Ё" => "Yo", "Ж" => "J", "З" => "Z", "И" => "I",
		"Й" => "I", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N",
		"О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T",
		"У" => "Y", "Ф" => "F", "Х" => "H", "Ц" => "C", "Ч" => "Ch",
		"Ш" => "Sh", "Щ" => "Sh", "Ы" => "I", "Э" => "E", "Ю" => "U",
		"Я" => "Ya",
		"ь" => "", "Ь" => "", "ъ" => "", "Ъ" => "",
		"ї" => "j", "і" => "i", "ґ" => "g", "є" => "ye",
		"Ї" => "J", "І" => "I", "Ґ" => "G", "Є" => "YE", ' ' => '_'];
	return strtr($input, $transliteMatrix);
}

/**
 * 6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
 */
function lesson_3_task6()
{
	$menuData = [
		'MAN' => ['Accessories', 'Bags', 'Denim', 'T-Shirts',],
		'WOMAN' => ['Accessories', 'Jackets & Coats', 'Polos', 'T-Shirts', 'Shirts'],
		'KIDS' => ['Accessories', 'Jackets & Coats', 'Polos', 'T-Shirts', 'Shirts', 'Bags'],
	]; ?>
	<?php
	foreach ($menuData as $category => &$pages): ?>
	  <li class="main-menu__item">
		  <span class="main-menu__cat"><a href="#" class="main-menu__link"><?= $category; ?></a></span>
			 <?php if (count($pages)): ?>
			 <ul class="main-menu__sub">
			   <?php foreach ($pages as &$page): ?>
					<li class="main-menu__item"><a href="#" class="main-menu__link"><?= $page; ?></a></li>
			   <?php endforeach; ?>
			 </ul>
			 <?php endif; ?>
	  </li>
	<?php endforeach; ?>
<?php } ?>
<?php
/**
 * 7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
 * for (…){ // здесь пусто}
 */
function lesson_3_task7()
{
	for ($i = 0; $i < 10; print $i++) {
	};
}

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
	<script>
		 /* Урок 2 Вывод */
		 console.log(`PHP_Level-1 Lesson-2\nЗадача 1: <?=lesson_2_task1(2, -4);?>\nЗадача 2:\n- Начальное число: <?=$num_lesson_2_task2;?>\n- Результат: <?=lesson_2_task2($num_lesson_2_task2);?>\nЗадача 3: <?=$addition(2, 2);?>\nЗадача 4: <?=$mathOperation(10, 12, '+');?>\nЗадача 6: <?=power(2, 4);?>\nЗадача 7: <?=local_time();?>`);
		 /* Урок 3 Вывод */
		 console.log(`PHP_Level-1 Lesson-3\nЗадача 1: <?=$lesson_3_task1();?>\nЗадача 2:<?php $lesson_3_task2();?>\nЗадача 3:\n<?php lesson_3_task3("К");?>Задача 4: <?=lesson_3_task4('Почему надо писать быдлокод еще и тут');?>\nЗадача 7: <?php lesson_3_task7();?>`);
	</script>
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
				<?php lesson_3_task6(); ?>
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
	<div class="copiryght">&copy; <?= date("Y"); ?> Brand All Rights Reserved.</div>
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
