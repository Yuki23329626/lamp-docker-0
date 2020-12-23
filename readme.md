# Docker container for Apache web server

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
It is default not using the https protocol  
For more setting, you can modify the config file in the ./apache/conf/  

## build

build the image of Apache with serveral settings in apache/Dockerfile as a container by docker-compose

```bash
sh build.sh
```

## attach

get into your docker container

```bash
sh attach.sh
```

if you want to exit the container, just type "exit" in bash

```bash
exit
```

## stop

stop your docker container

```bash
sh stop.sh
```
