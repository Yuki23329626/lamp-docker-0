# 重要 mysql 指令教學


1. 查詢密碼  
```bash
echo $MYSQL_ROOT_PASSWORD
```
2. 進入 mariadb 的 container bash  
```bash
container_id=`docker ps | grep mariadb | cut -c1-12`
docker exec -it $container_id /bin/bash
```
3. 進入 mariadb 的 cli 介面  
```bash
mysql --local-infile -u root -p 'openid' --default-character-set=utf8mb4
# 之後要輸入密碼
```


