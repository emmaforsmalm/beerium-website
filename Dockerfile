FROM wordpress:latest

RUN a2dismod mpm_event mpm_worker || true && \ a2enmod mpm_prefork

COPY . /var/www/html/wp-content