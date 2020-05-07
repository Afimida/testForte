#!/usr/bin/env bash
sudo service nginx stop
sudo /etc/init.d/mysql stop
sudo service php7.2-fpm stop
sudo service apache2 stop
sudo docker-compose up --build --force-recreate
sudo docker ps -a