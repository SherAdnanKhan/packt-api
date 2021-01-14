FROM php:7.4-fpm

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libpq-dev \
    locales \
    zip \
    cron \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libsqlite3-dev \
    sqlite3

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*



# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite

# Install extensions
#RUN docker-php-ext-install pdo pdo_pgsql
RUN docker-php-ext-install pcntl


COPY --chown=1000:1000 php.ini /usr/local/etc/php/


# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create the scheduler log file
RUN touch /var/log/schedule.log
RUN chmod 0777 /var/log/schedule.log

# Add crontab file in the cron directory
ADD scheduler /etc/cron.d/scheduler

# Apply the cron
RUN crontab /etc/cron.d/scheduler

# Setup the entry point
RUN mkdir /app
COPY entrypoint.sh /app
RUN chmod u+x /app/entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["/app/entrypoint.sh"]