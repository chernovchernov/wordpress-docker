# Wordpress site in docker container
This is files for compile docker image of wordpress site 

Requirements
-------------

You need open source projects to work properly:

- Server: ubuntu-20.04.4-live-server-amd64 ([Ubuntu])
- Docker ([Docker])
- Mysql ([MySQL])

Launch MySQL-Server
--------------------

Install and Launch Mysql-server:
```
sudo apt update
sudo apt install mysql-server
sudo mysql
```
Create Wordpress Database:
```
mysql> CREATE DATABASE wordpress;
Query OK, 1 row affected (0,00 sec)
```
Create Wordpress User (<container_ip_address> find by using command `docker inspect <your_container_name> | grep IPAddress`):
```
mysql> CREATE USER wordpress@<container_ip_address> IDENTIFIED BY '<your-password>';
Query OK, 1 row affected (0,00 sec)
```

Give to user some rights to edit Wordpress site 
```
mysql> GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,ALTER
    -> ON wordpress.*
    -> TO wordpress@<container_ip_address>;
    Query OK, 1 row affected (0,00 sec)
   
mysql> FLUSH PRIVILEGES;
Query OK, 1 row affected (0,00 sec)

mysql> quit
Bye
```

Edit `wp-config.php` file: 
```
nano wp-config.php
```

Change 'password' to your password and 'localhost' to IP address of your server:

```
define( 'DB_PASSWORD', '<your_password>' );
define( 'DB_HOST', 'localhost:3306' );
```
Find all notes of "bind address":
```
grep -r "bind-address" /etc
```
and change it to the `0.0.0.0`
Files `/etc/mysql/conf.d/mysql.cnf` and `/etc/mysql/mysql.conf.d/mysql.cnf` also might consist following sets:
```
[mysql]
bind-address = 0.0.0.0
```
Restart Mysql:
```
sudo service mysql restart
```
Launch Docker image
-------------------
Install Docker, make directory and put all files from this repository there.
Launch it by the following step:

```
docker build -t wordpress:v1 .
```

After few minutes, you will get docker image with our wordpress site.
Launch docker image to docker container by following command:

```
docker run --network bridge -d -p 443:443 wordpress:v1
```


> Note: Write IP addres of local server at /etc/hosts file in your computer where you checking result
> "ip_address_server1" one.wordpress.ru www.one.wordpress.ru


To check please open following links:

www.one.wordpress.ru

License
--------

BSD

[Ubuntu]: <https://ubuntu.com>
[site1]: <https://one.wordpress.ru>
[Docker]: <https://docs.docker.com>
[MySQL]: <https://dev.mysql.com/doc/>

Author Information
-------------------

Boris Chernov <chernov001@gmail.com>
