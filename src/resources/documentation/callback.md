# Callbacks
The Packt API can make callbacks to a custom URL whenever there is a data update.

Setup your callback URL under the Callback section of the site.

A JSON formatted HTTP POST to your chosen URL will be made with the following parameters.

## Returned values

| Parameter   | Description                                                  | Data type |
| ----------- | ------------------------------------------------------------ | --------- |
| code        | Code referring to the type of change,                        | string    |
| timestamp   | The time the change took place.                              | datetime  |
| id          | ID of the object that has changed, to be taken in code context. | string    |
| description | Description of what has changed (optional)                   | string    |

## Callback Codes

| Code | Description                          |
| ---- | ------------------------------------ |
| 100  | Product Information has been changed |
| 101  | New Product Available                |
| 200  | Content Updated                      |

This callback table will be further added to as our callback system is further developed.

## Retries
A callback will be retried until an OK (200) Status code is received from your server, or until the callback has failed 10 times. The time between each callback retry attempt will increase each time there is a failure.

