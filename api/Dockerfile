FROM phpdockerio/php80-fpm:latest
WORKDIR "/oberon/api"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \ 
        php8.0-gd \
        php8.0-grpc \ 
        php8.0-http \ 
        php8.0-imagick \ 
        php8.0-intl \ 
        php8.0-mcrypt \ 
        php8.0-raphf \ 
        php8.0-memcache \ 
        php8.0-memcached \ 
        php8.0-mongodb \ 
        php8.0-mysql \ 
        php8.0-oauth \ 
        php8.0-odbc \ 
        php8.0-pgsql \ 
        php8.0-psr \ 
        php8.0-redis; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY php-ini-overrides.ini /etc/php/8.0/fpm/conf.d/99-overrides.ini