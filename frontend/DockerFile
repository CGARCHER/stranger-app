# FRONTEND: PHP + Apache
FROM php:8.2-apache

# Habilitar mod_rewrite por si acaso
RUN a2enmod rewrite

# Directorio donde Apache servirá la app
WORKDIR /var/www/html

# Copiar todo el proyecto frontend dentro del contenedor
COPY . /var/www/html

# Puerto que expone Apache dentro del contenedor
EXPOSE 80