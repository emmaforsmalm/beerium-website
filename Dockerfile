FROM wordpress:latest

RUN a2dismod php8.* || true && \
a2enmod php8.2 || true

COPY . /var/www/html/wp-content