#!/bin/bash

# Overcome permission issues when building this project
sudo chmod -R a+rw data/
sudo chmod -R a+rw src/storage
sudo chmod -R a+rw src/bootstrap/cache


if [ -d data ]; then
  echo "${GREEN}Running ${RED}chmod over mysql data${GREEN}:${NC}"
  eval "$CHMOD_MYSQL_DATA"
fi

if [ -d src/storage ]; then
  echo "${GREEN}Running ${RED}chmod over src/storage${GREEN}:${NC}"
  eval "$CHMOD_SRC_STORAGE"

fi

if [ "$1" == "prod" ]; then
docker-compose -f  docker-compose.prod.yml build
docker-compose -f docker-compose.prod.yml up -d
else
  docker-compose build
  docker-compose up -d
fi


echo "${GREEN}Running ${RED}Composer Installer ${GREEN}:${NC}"
./composer.sh install

echo "${GREEN}Running ${RED}npm ci${GREEN}:${NC}"
./npm.sh install

./php-artisan.sh cache:clear

if [ $1 == 'prod' ]; then
./npm.sh run production
./php-artisan.sh config:cache
./php-artisan.sh route:cache
./php-artisan.sh view:cache
else
./npm.sh run development
fi

# Clear all caches for fresh start
