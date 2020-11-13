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

# Build docker images
docker-compose build

# Bring everything up, run in background
docker-compose up -d

echo "${GREEN}Running ${RED}Composer Installer ${GREEN}:${NC}"
./composer.sh install

echo "${GREEN}Running ${RED}npm ci${GREEN}:${NC}"
./npm.sh install && ./npm.sh run dev

# Clear all caches for fresh start
./php-artisan.sh cache:clear