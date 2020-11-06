# Format

## Request format
Requests should be made using HTTP form data.

## Response format

Please note that responses are formatted in JSON. 

## Error handling

Errors are returned using standard HTTP status codes with an errorMessage payload.

## Standard API errors


| Code | Description                                                  |
| ---- | ------------------------------------------------------------ |
| 400  | Bad or missing input parameter- see error for more details.  |
| 403  | Access Denied, your key is either invalid or you do not have access to this resource |
| 404  | Resource not found.                                          |
| 429  | Rate Limit Exceeded                                          |


## Error code format
All errors should return a standard JSON object in the response, containing an error message.

```json
{
    "errorMessage": "This is a sample error message"
}
```

## Timestamps

All timestamps return in ISO 8601 format:

```
YYYY-MM-DDTHH:MM:SSZ
```