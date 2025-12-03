FROM httpd:2.4

ARG FRONTEND_URL=http://localhost:8081
ARG API_BACKEND_URL=http://localhost:8080

ENV FRONTEND_URL=${FRONTEND_URL}
ENV API_BACKEND_URL=${API_BACKEND_URL}

# Copiar configuración del proxy
COPY httpd-proxy.conf /usr/local/apache2/conf/extra/httpd-proxy.conf

# Habilitar módulos necesarios en httpd.conf y sustituir placeholders
RUN sed -i \
    -e 's/#LoadModule rewrite_module/LoadModule rewrite_module/' \
    -e 's/#LoadModule proxy_module/LoadModule proxy_module/' \
    -e 's/#LoadModule proxy_http_module/LoadModule proxy_http_module/' \
    /usr/local/apache2/conf/httpd.conf \
    && sed -i "s#__FRONTEND_URL__#${FRONTEND_URL}#g; s#__API_BACKEND_URL__#${API_BACKEND_URL}#g" /usr/local/apache2/conf/extra/httpd-proxy.conf \
    && echo "Include conf/extra/httpd-proxy.conf" >> /usr/local/apache2/conf/httpd.conf \
    && cat /usr/local/apache2/conf/extra/httpd-proxy.conf

EXPOSE 80
CMD ["httpd-foreground"]