#!/bin/bash
# Program:
#	The script used to stop the apache docker container
# History:
# 2020/12/23	nxshen	First release
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin

container_id=`docker ps | grep wamp-docker_apache | cut -c1-12`

echo "stopping container: apache"
echo "container_id = ${container_id}"

docker stop $container_id

exit 0
