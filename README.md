# packt-api
External Developer/B2B friendly API service/portal


## Running and Deploying
1. Clone repository
2. Run the following command ```./start.sh``` from terminal
3. This should build the images and run the docker containers as well as do a npm install and composer install.
4. To stop, simply run the following command: ```./stop.sh```

## Issues

### Profile picture not rendering
	
In your .env make sure the APP_URL is set to:
	
APP_URL=http://127.0.0.1:8080
	
Go into src/public and remove the storage symlink

Go back upto the root dir and then run ./php-artisan.sh storage:link
