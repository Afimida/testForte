#!/usr/bin/env bash
# windows | Set-Content dump.sql
sudo docker-compose stop
docker ps -a | grep Exit | cut -d ' ' -f 1 | xargs sudo docker rm
docker ps -a | grep Created | cut -d ' ' -f 1 | xargs sudo docker rm
docker ps -a | grep Stop | cut -d ' ' -f 1 | xargs sudo docker rm
docker ps -a