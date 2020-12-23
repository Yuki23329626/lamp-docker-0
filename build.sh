#!/bin/bash
# Program:
#	The script is used to build the apache container
# History:
# 2020/09/26	nxshen	First release
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin

if [ "$MYSQL_ROOT_PASSWORD" = "" ]
then
  echo "\nYou should set your MYSQL_ROOT_PASSWORD at first"
  echo "\ne.g.: export MYSQL_ROOT_PASSWORD=\"the_password_you_want\"\n"
  exit 0
fi

echo "building container..."
docker-compose up --build -d

exit 0
