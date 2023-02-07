#-----------------------------------------------------
#
#    This is Docker file of Wordpress and apache2
#
#    Date: 02-04-2023
#
#    Author: Boris Chernov chernov001@gmail.com
#
#-----------------------------------------------------

FROM ubuntu:20.04

#Installing nesseciary for Wordpress programs
#MySQL we already have with database, user and privileges
ENV TZ=UTC
RUN apt-get -y update
RUN apt-get install -y tzdata
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get -y install netcat
RUN apt-get -y install telnet
RUN apt-get -y install apache2
RUN apt-get -y install ghostscript
RUN apt-get -y install libapache2-mod-php
RUN apt-get -y install php
RUN apt-get -y install php-bcmath
RUN apt-get -y install php-curl
RUN apt-get -y install php-imagick
RUN apt-get -y install php-intl
RUN apt-get -y install php-json
RUN apt-get -y install php-mbstring
RUN apt-get -y install php-mysql
RUN apt-get -y install php-xml
RUN apt-get -y install php-zip
RUN apt-get -y install wget
RUN wget https://wordpress.org/latest.tar.gz
RUN tar -zxvf latest.tar.gz
RUN mv wordpress /var/www/
RUN chown www-data:www-data /var/www/wordpress
RUN chmod 755 /var/www/wordpress
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

#SSL key and cert for security connection of HTTP
COPY wordpress.crt /etc/ssl/certs/wordpress.crt
COPY wordpress.key /etc/ssl/private/wordpress.key

#Copy wordpress config
COPY wordpress.conf /etc/apache2/sites-available/
COPY ssl-wordpress.conf /etc/apache2/sites-available/
RUN a2ensite wordpress
RUN a2enmod rewrite
RUN a2dissite 000-default
RUN a2ensite ssl-wordpress.conf
RUN a2enmod ssl
RUN service apache2 start
COPY wp-config.php /var/www/wordpress/wp-config.php
RUN service apache2 restart
EXPOSE 80
EXPOSE 443
CMD ["apachectl", "-D", "FOREGROUND"]
