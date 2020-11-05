# packt-api
External Developer/B2B friendly API service/portal


# Running and Deploying

## Issues

### Profile picture not rendering
	
In your .env make sure the APP_URL is set to:
	
APP_URL=http://127.0.0.1:8080
	
Go into src/public and remove the storage symlink

Go back upto the root dir and then run ./php-artisan.sh storage:link
