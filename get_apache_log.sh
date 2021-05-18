#!/bin/bash
# Program:
#       The script is used to get apache logs
# History:
# 2021/05/18    nxshen  First release
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin

container_id=`docker ps | grep lamp-docker_apache | cut -c1-12`

echo "entering bash of container: apache"
echo "container_id = ${container_id}"

docker logs -t $container_id

