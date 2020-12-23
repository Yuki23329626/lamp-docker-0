FROM php:7.3.25-apache-stretch

RUN apt-get update -y
RUN apt-get install -y vim
RUN makedir /etc/apache2/ssl

COPY ./conf/.vimrc /root/
COPY ./data/* /var/www/html/
COPY ./conf/apache2.conf /etc/apache2/
COPY ./ssl/* /etc/apache2/ssl/
#COPY ./entrypoint.sh /root/
