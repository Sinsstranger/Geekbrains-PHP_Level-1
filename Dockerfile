FROM php:apache
RUN apt-get update && apt-get install -y \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libpng-dev \
	mariadb-client \
  apache2-utils \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install pdo pdo_mysql mysqli -j$(nproc) gd \
  && a2enmod rewrite && service apache2 restart