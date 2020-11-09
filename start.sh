#!/bin/bash

# Overcome permission issues when building this project
sudo chmod -R a+rw data/
sudo chmod -R a+rw src/storage
sudo chmod -R a+rw src/bootstrap/cache


# Build docker images
docker-compose build

# Bring everything up, run in background
docker-compose up -d

./composer.sh install
./npm.sh install && ./npm.sh run dev

# Clear all caches for fresh start
./php-artisan.sh cache:clear