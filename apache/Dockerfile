FROM php:7.3.25-apache-stretch

RUN apt-get update -y
RUN apt-get install -y vim
#RUN mkdir /etc/apache2/ssl

COPY ./conf/.vimrc /root/
COPY ./data/* /var/www/html/
COPY ./conf/apache2.conf /etc/apache2/
COPY ./conf/000-default.conf /etc/apache2/sites-available/
COPY ./conf/default-ssl.conf /etc/apache2/sites-available/
COPY ./ssl/* /etc/apache2/ssl/
