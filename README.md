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
This project is default turning on the https service  
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

## Check the logs on Apache  

If you want to check the logs while testing the website, you can use the following script.

```bash
sh get_apache_log.sh
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
一、There are several difference between apache 2.2 and apache 2.4  
1. The config files are move into /etc/apache2/ in apache 2.4  
2. The config file of http host is /etc/apache2/sites-available/000-default.conf  
3. You can edit /etc/apache2/apache2.conf to enable https service  
4. If you want to view your directories in index form in /var/www/html on the web page,  
you need to add some setting in the block of \<Directory /var/www/html\> in ./apache/conf/apache2.conf  
	
```
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
```

## References  
1. [Meaning of Tags](https://github.com/docker-library/docs/tree/master/php)
2. [Apache Virtual Host](https://blog.xuite.net/tolarku/blog/485166953-Apache+Virtual+Host+%E5%A4%9A%E7%B6%B2%E5%9F%9F%E7%B6%B2%E7%AB%99%E6%94%BE%E7%BD%AE%E5%9C%A8%E5%90%8C%E4%B8%80%E5%8F%B0%E4%B8%BB%E6%A9%9F%E4%B8%8A)
3. [Migrate your Apache Configuration from 2.2 to 2.4 Syntax](https://www.digitalocean.com/community/tutorials/migrating-your-apache-configuration-from-2-2-to-2-4-syntax)
