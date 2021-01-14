#!/bin/bash

CONSOLE_RED=$'\e[36m'

echo -e "🧪 ${CONSOLE_RED}Running All Tests..."

docker exec -it  packt-api-php php artisan test