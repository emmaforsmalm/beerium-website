FROM bitnami/wordpress:latest

COPY plugins/ /bitnami/wordpress/wp-content/plugins/

RUN wp plugin install advanced-custom-fields mailin contact-form-7 wp-mail-smtp wp-webhooks wordpress-seo advanced-media-offloader

