FROM httpd:2.4

# --- ARGs de build: Render y docker-compose los rellenarán ---
ARG FRONTEND_URL=http://localhost:8081
ARG API_BACKEND_URL=http://localhost:8080

# También como ENV (solo informativo)
ENV FRONTEND_URL=${FRONTEND_URL}
ENV API_BACKEND_URL=${API_BACKEND_URL}

# Copiamos la configuración del proxy
COPY httpd-proxy.conf /usr/local/apache2/conf/extra/httpd-proxy.conf

# Sustituimos placeholders por las URLs reales (CORREGIDO)
RUN sed -i "s#__FRONTEND_URL__#${FRONTEND_URL}#g; s#__API_BACKEND_URL__#${API_BACKEND_URL}#g" /usr/local/apache2/conf/extra/httpd-proxy.conf \
    && echo "Include conf/extra/httpd-proxy.conf" >> /usr/local/apache2/conf/httpd.conf

EXPOSE 80

CMD ["httpd-foreground"]