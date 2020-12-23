# wamp-docker
WAMP in the docker containers. Useful in testing a website.

## 重要  
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
