# main image
FROM php:8.3-apache

# installing dependencies
RUN apt-get update && apt-get install -y \
    git \
    ffmpeg \
    libfreetype6-dev \
    libicu-dev \
    libgmp-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    libzip-dev \
    unzip \
    zlib1g-dev \
    wget \
    curl

# configuring php extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-configure intl

# installing php extension
RUN docker-php-ext-install bcmath calendar exif gd gmp intl mysqli pdo pdo_mysql zip

# installing composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# installing node js and pnpm
COPY --from=node:20-slim /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node:20-slim /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/corepack/dist/corepack.js /usr/local/bin/corepack
ENV PNPM_HOME="/pnpm"
ENV PATH="$PNPM_HOME:$PATH"
ENV COREPACK_INTEGRITY_KEYS=0
RUN corepack enable

# arguments
ENV container_project_path=/var/www/html
ENV uid=1000
ENV user=root

# setting work directory
WORKDIR $container_project_path

# adding user
RUN useradd -G www-data,root -u $uid -d /home/jahwin jahwin
RUN mkdir -p /home/jahwin/.composer && \
    chown -R jahwin:jahwin /home/jahwin

# setting apache
COPY ./.configs/apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# changing user
USER $user

# Copying project files
COPY . $container_project_path

# Create session directory
RUN mkdir -p /var/www/html/storage/framework/sessions

# setting up project from `src` folder
RUN chown -R www-data:www-data $container_project_path
RUN chmod -R 777 $container_project_path

# Installing project dependencies
RUN composer install
RUN pnpm install

# Building project
RUN pnpm build

# Exposing port
EXPOSE 80