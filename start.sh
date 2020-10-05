#!/bin/bash

# Overcome permission issues when building this project
sudo chmod -R a+rw data/
sudo chmod -R a+rw src/storage

# Build docker images
docker-compose build

# Bring everything up, run in background
docker-compose up -d

# Clear all caches for fresh start
./php-artisan.sh cache:clear