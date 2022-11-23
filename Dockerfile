FROM creativitykills/nginx-php-server:2.0.0
MAINTAINER Adsert TechAdmin <deep@exchangemedia.com>
    COPY . /var/www/
    RUN chmod -Rf 777 /var/www/storage/
    RUN chmod -Rf 777 /var/www/bootstrap/
    RUN chmod -Rf 777 /var/www/public/
