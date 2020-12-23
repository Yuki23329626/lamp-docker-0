# lamp-docker
LAMP (Linux + Apache + Mysql + PHP) in the docker containers.  
Useful in testing a website.  
 
## Requirements
Install following tools in your physical environment:  
- [docker](https://docs.docker.com/get-docker/)
- [docker-compose](https://docs.docker.com/compose/install/)

## Port Setting

I use "80:80" and "443:443" as the port setting of the container.  
Port 80 and 443 is the default setting for http and https protocol in Apache server.  
but you need to map the ports between your physical server and Apache server in a container.  
In docker-compose.yml it will be in this format:  
```yaml
services:
  apache:
    build: ./apache
    #restart: always
    ports:
      - 80:80 # physical port : container port
      - 443:443 # physical port : container port
    environment:
      MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
    volumes:
      - ./apache/data:/var/www/html:rw
    networks:
      - lampnet
```
You can change your setting in the ./docker-compose.yml  

If it doesn't work, you should check your firewall setting in you physical environment.  

## SSL/TLS Setting
This project is default turn on the https service  
If you don't want to use ssl/tls, you can modify the config file in the ./apache/conf/apache2.conf  

```xml
# comment the following lines if you don't want to use ssl/tls
LoadModule ssl_module /usr/lib/apache2/modules/mod_ssl.so

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
# comment the above lines if you don't want to use ssl/tls
```

## Build up the containers  

Build the image of Apache + Mariadb + Adminer by docker-compose  

```bash
sh build.sh
```

## Attach to container's bash  

Get into your apache container  

```bash
sh attach.sh
```

If you want to exit the container, just type "exit" in bash  

```bash
exit
```

## Stop the containers  

Stop all your docker containers  

```bash
sh stop.sh
```


## Important Notes  
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
