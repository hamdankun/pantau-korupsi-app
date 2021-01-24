FROM php:7.3-cli

WORKDIR /var/www

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync
RUN install-php-extensions gd bcmath mongodb


COPY . /app

CMD ["/app/artisan", "serve", "--host=0.0.0.0"]