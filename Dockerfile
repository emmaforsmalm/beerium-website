FROM bitnami/wordpress:latest

COPY plugins/ /opt/bitnami/wordpress/wp-content/plugins/
RUN chown -R 1001:1001 /opt/bitnami/wordpress/wp-content/plugins/


