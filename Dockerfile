FROM php:7.2-apache
COPY ./tdb314/ /var/www/html/
RUN chown -R www-data: /var/www/html
EXPOSE 80
