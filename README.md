# wamp-docker
WAMP in the docker containers. Useful in testing a website.

# Docker container for Apache web server
Running Apache Server in docker container. Useful in testing a website.  
## Requirements
Install following tools in your physical environment:  
- [docker](https://docs.docker.com/get-docker/)
- [docker-compose](https://docs.docker.com/compose/install/)

## port

I use "9021:80" and "9022:443" as the port setting of the container.  
Port 80 and 443 is the default setting for http and https protocol in Apache server.  
but you need to map the ports between your physical server and Apache server in a container.  
  
In my case, if an user want to get my web page on the internet,  
it needs to send http://myWebsiteDomainName:9021 to get the correspoing resources from my container  
  
You can change your setting in the docker-compose.yml

## ssl
It is default using the https protocol  
If you don't want https, you can modify the config file in the ./apache/conf/  

## build

build the image of php-Apache + mariadb + adminer by docker-compose

```bash
sh build.sh
```

## attach

get into your apache container

```bash
sh attach.sh
```

if you want to exit the container, just type "exit" in bash

```bash
exit
```

## stop

stop all your docker containers  

```bash
sh stop.sh
```


## 重要筆記  
一、apache 2.2 跟 apache 2.4 的設定檔撰寫方式不太一樣  
1. 2.4 設定檔案都在 /etc/apache2/  
2. http host 的設定檔在 /etc/apache2/sites-available/000-default.conf  
3. https host 可以寫在 /etc/apache2/apache2.conf 上  
4. 如果需要使用目錄檢視的方式的話，需要在 host 設定裡的 <directory> 加上一些設定  
```
LoadModule ssl_module /usr/lib/apache2/modules/mod_ssl.so
#Listen 80
Listen 443
<VirtualHost *:443>
	ServerName michael7105.csie.io
	DocumentRoot /var/www/html
	SSLEngine on
	<Directory /var/www/html/>
		Options Indexes FollowSymLinks
        	AllowOverride None
		Require all granted
    	</Directory>
	SSLCertificateFile "/etc/apache2/ssl/certificate.crt"
	SSLCertificateKeyFile "/etc/apache2/ssl/private.key"
	SSLCACertificateFile "/etc/apache2/ssl/ca_bundle.crt"
</VirtualHost>
```
