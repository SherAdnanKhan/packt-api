#!/bin/bash

# Build docker images
docker-compose build --no-cache 

# Install all dependancies
./composer.sh install

# If no .env file default to the dev one
if [ ! -f src/.env ]
  then
    cp src/.env-dev src/.env
fi