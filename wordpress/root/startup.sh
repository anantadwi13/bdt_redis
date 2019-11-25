#!/bin/bash


# Configuring laravel env
sed -i "s/.*define( 'DB_NAME', 'wordpress' );.*/define( 'DB_NAME', '${DB_NAME}' );/" /var/www/wordpress/wp-config.php
sed -i "s/.*define( 'DB_USER', 'root' );.*/define( 'DB_USER', '${DB_USER}' );/" /var/www/wordpress/wp-config.php
sed -i "s/.*define( 'DB_PASSWORD', '' );.*/define( 'DB_PASSWORD', '${DB_PASSWORD}' );/" /var/www/wordpress/wp-config.php
sed -i "s/.*define( 'DB_HOST', 'localhost' );.*/define( 'DB_HOST', '${DB_HOST}' );/" /var/www/wordpress/wp-config.php

sed -i "s/.*define('FTP_USER', 'example');.*/define( 'FTP_USER', '${FTP_USER}' );/" /var/www/wordpress/wp-config.php
sed -i "s/.*define('FTP_PASS', 'password');.*/define( 'FTP_PASS', '${FTP_PASS}' );/" /var/www/wordpress/wp-config.php
sed -i "s/.*define('FTP_HOST', 'example.com:21');.*/define( 'FTP_HOST', ${FTP_HOST} );/" /var/www/wordpress/wp-config.php
sed -i "s/.*#PermitRootLogin prohibit-password.*/PermitRootLogin yes/" /etc/ssh/sshd_config
sed -i "s/.*#PasswordAuthentication yes.*/PasswordAuthentication yes/" /etc/ssh/sshd_config
sed -i "s/.*#AllowTcpForwarding yes.*/AllowTcpForwarding yes/" /etc/ssh/sshd_config
sed -i "s/.*#PermitTunnel no.*/PermitTunnel yes/" /etc/ssh/sshd_config

echo -e '${FTP_PASS}\n${FTP_PASS}' | passwd root

service ssh restart
service apache2 restart
