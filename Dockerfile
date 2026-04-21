FROM wordpress:latest

RUN apt-get update && apt-get install -y apache 2 && \
a2dismod mpm_event mpm_worker || true && \
a2enmod mpm_prefork

COPY . /var/www/html/wp-content