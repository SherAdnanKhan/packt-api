# Callbacks (Webhooks)
Webhooks are a user-defined HTTP callback triggered by an event within Packt. The Packt API uses webhooks to asynchronously let your application know when these events happen, like a new product being published or a change in product information.

When the webhook event occurs, Packt makes an HTTP POST request to the URL you have configured for your webhook. The request to your application will include details of the event like the title of the product changed. Your application can then perform api calls to determine further details.

An example call;

```json
{
    "code":"100",
    timestamp:"2020-11-18T09:58:05Z",
    id:"9781789955750",
    description:"Author biography update for Python Machine Learning - Third Edition"    
}
```



## Callback Parameters

| Parameter   | Description                                                  | Data type |
| ----------- | ------------------------------------------------------------ | --------- |
| code        | Code referring to the type of change,                        | string    |
| timestamp   | The time the change took place.                              | datetime  |
| id          | ID of the object that has changed, to be taken in code context. | string    |
| description | Description of what has changed (optional)                   | string    |

## Callback Codes

| Code | Description                          |
| ---- | ------------------------------------ |
| 000  | Canary (Test).... Tweet!             |
| 100  | Product Information has been changed |
| 101  | New Product Available                |
| 200  | Content Updated                      |

This callback table will be further added to as our callback system is further developed.

## Canary Callbacks

We will automatically send you a canary callback once every 8 hours if you tell us to when you configure your callback. This is to let you know our system is still alive (for monitoring) and for you to use as a continuous test end point.

## Retries

A callback will be retried until an OK (200) Status code is received from your server, or until the callback has failed 10 times. The time between each callback retry attempt will increase each time there is a failure, we will stop trying after approximately 1 week.

