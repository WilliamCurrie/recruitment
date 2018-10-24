FROM php:7.1-fpm

RUN buildDeps="libpq-dev libzip-dev libicu-dev" && \
    apt-get update && \
    apt-get install -y $buildDeps --no-install-recommends

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli

# Install composer globally
RUN echo "Install composer globally"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Install GIT
RUN echo "Install GIT"
RUN apt-get update && apt-get install -y git

# Install WGET
RUN echo "Install WGET"
RUN apt-get update && apt-get install -y wget

#instal GNUPG
RUN echo "Install GNUPG"
RUN apt-get update && apt-get install -y gnupg

# Install XDebug
RUN echo "Install XDEBUG"

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_host=localhost" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.profiler_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.profiler_output_dir=/tmp/xdebug-nicky" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.profile_enable_trigger=1" >> /usr/local/etc/php/conf.d/xdebug.ini\
    #&& echo "xdebug.remote_log=var/log/xdebug/xlog" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.extended_info=1" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/xdebug.ini
#instal VIM
RUN echo "Install VIM"
RUN apt-get update && apt-get install -y vim

RUN export XDEBUG_CONFIG="idekey=session_name remote_host=localhost profiler_enable=1"