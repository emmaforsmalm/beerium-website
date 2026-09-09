FROM bitnami/wordpress:latest

COPY --chown=1001:1001 plugins/ /opt/bitnami/wordpress/wp-content/plugins/


