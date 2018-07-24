FROM "wordpress:php7.0-apache"

ENV WORDPRESS_VERSION 4.8.4
ENV WOOCOMMERCE_VERSION 3.3.4

RUN apt-get update \
    && apt-get install -y --no-install-recommends less unzip libxml++2.6-dev \
    \
    && curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp \
    && wp --info \
    \
    && curl -B https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    \
    && cd /usr/src/wordpress/wp-content/plugins \
    && curl -B https://downloads.wordpress.org/plugin/woocommerce.$WOOCOMMERCE_VERSION.zip -o woocommerce.zip \
    && unzip woocommerce.zip \
    && rm woocommerce.zip \
    \
    && rm -rf /var/lib/apt/lists/*;

# RUN docker-php-ext-install soap
