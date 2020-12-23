# Dockerfile

It will pull Apache image from docker hub to build the container  
you can choose which version of Apache http server you want by changing the tag  
For more information about tags please check [Apache, is a Web server - Docker Hub](https://hub.docker.com/_/httpd)  

## conf

The place which stores config file of Apache server.  
It will copy the http.conf you put in the ./conf/ into the container's /usr/local/apache2/conf/,  
which is the default path of Apache's config file

## ssl

If your project needs to use CA certifications, you can put those files into this directory,  
the port of https is set to 9022, you can change the setting in ../docker-compose.yml  
CA files needs to be named as private.key, certificate.crt, and ca_bundle.crt respectively.

## data

Everything you put under the ./data/ will be copied into container's /usr/local/apache2/htdocs/  
It's the default root of Apache(httpd:2.4) server.  
As for me, I put the relative resources of my web page(html, css, js) in this directory.  
