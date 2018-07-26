FROM php:7.2.7-apache

RUN apt-get update && apt-get install -y \
      libicu-dev \
      git \
      zip \
      unzip \
      zlib1g-dev \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-install \
      intl \
      pcntl \
      zip \
      opcache \
      pdo_mysql

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

RUN a2enmod rewrite \
    && a2enmod ssl \
    && a2ensite 000-default \
    && a2ensite default-ssl

EXPOSE 80 443

ENV APP_HOME /var/www/html

RUN sed -i -e "s/html/html\/webroot/g" /etc/apache2/sites-available/000-default.conf \
    && sed -i -e "s/html/html\/webroot/g" /etc/apache2/sites-available/default-ssl.conf

COPY . $APP_HOME

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && composer install --no-interaction \
    && rm /usr/bin/composer && rm -rf /root/.composer

RUN chown -R www-data:www-data $APP_HOME
