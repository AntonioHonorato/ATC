# Utilizamos una imagen base que contenga PHP y Apache
FROM php:8.1-apache

# Variables de argumento
ARG uid
ARG user




# Actualizamos los paquetes e instalamos extensiones de PHP que puedan ser necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nano \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd


# Copia el archivo de configuración de Apache para habilitar el sitio Laravel
#COPY apache2.conf /etc/apache2/sites-available/000-default.conf

# Habilita la reescritura de URLs
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Reinicia Apache
RUN service apache2 restart

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de Laravel al contenedor
COPY . .

# Crea una carpeta para composer
RUN mkdir -p /usr/local/bin/composer

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crea un usuario de sistema para ejecutar comandos de Composer y Artisan
RUN useradd -G www-data,root -u 1000 -d /home/app app
RUN mkdir -p /home/app/.composer && \
    chown -R app:app /home/app

RUN chmod +x git.sh
RUN chmod +x docker.sh


# Instala las dependencias de Composer
RUN composer install

# Crea una carpeta para el almacenamiento de Laravel
RUN chown -R www-data:www-data /var/www/html/storage

RUN apt-get install -y git curl libmcrypt-dev default-mysql-client

# Expone el puerto 8000 para acceder a la aplicación Laravel
EXPOSE 80
