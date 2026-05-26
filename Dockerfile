FROM bitnami/wordpress:latest

USER root
RUN mkdir -p /bitnami/wordpress/wp-content && chown -R 1001:1001 /bitnami/wordpress/wp-content
USER 1001
