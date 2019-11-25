FROM ubuntu:18.04

ENV DEBIAN_FRONTEND noninteractive
ENV DEBCONF_NONINTERACTIVE_SEEN true

# Setting timezone
RUN echo "tzdata tzdata/Areas select Asia" > /tmp/preseed.txt; \
    echo "tzdata tzdata/Zones/Asia select Jakarta" >> /tmp/preseed.txt; \
    debconf-set-selections /tmp/preseed.txt && \
    apt update && \
    apt upgrade -y && \
    apt install -y tzdata

# Installing dependencies
RUN apt install -y htop nano curl libaio1\
    libmecab2 libnuma1 perl psmisc net-tools uuid-runtime 
    
# Installing webserver & php
RUN apt install -y wget git apache2 mysql-client php7.2 php7.2-dom php7.2-mbstring \
    php7.2-gd php7.2-zip php7.2-bcmath php7.2-json php7.2-mysql php7.2-pdo php7.2-intl

WORKDIR /var/www

# Cloning project from github
RUN wget https://wordpress.org/latest.tar.gz && \
    tar -xzvf latest.tar.gz

WORKDIR /var/www/wordpress

COPY config/ /tmp

# Configuring project
RUN cp /tmp/apache2.conf /etc/apache2/sites-available/000-default.conf &&\
    cp /tmp/wp-config.php wp-config.php &&\
    chmod -R 777 ./* &&\
    a2enmod rewrite

RUN apt install -y ssh &&\
    service ssh start