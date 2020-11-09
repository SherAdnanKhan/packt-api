#!/bin/bash

# Build docker images
docker-compose build --no-cache 

# If no .env file default to the dev one
if [ ! -f src/.env ]
  then
    cp src/.env.example src/.env
fi