FROM bitnami/wordpress:latest

USER root
RUN chown -R 1001:1001 /bitnami/wordpress
USER 1001
