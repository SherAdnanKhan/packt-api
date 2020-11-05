# Packt API

This is the documentation for the current version of our API, v1.0.

Need an account? Sign up now.

Requests should always be made over HTTPS. Connections cannot be made via HTTP. Please note that support for SSL 3.0 has been disabled and we recommend using TLS 1.2 or better.

# Format

## Request format
Requests should be made using HTTP form data.

## Response format

Please note that responses are formatted in JSON. 

Error handling
Errors are returned using standard HTTP status codes. Pwinty will return an empty version of the expected item, with an errorMessage parameter (this makes deserialization easier in some languages).

## Standard API errors


| Code | Description                                                  |
| ---- | ------------------------------------------------------------ |
| 400  | Bad or missing input parameter- see error for more details.  |
| 403  | Forbidden. The request is not valid for the resource in its current state. |
| 404  | Resource not found.                                          |
| 429  | Rate Limit Exceeded                                          |


## Error code format
All errors should return a standard JSON object in the response, containing an error message.

`{
    "errorMessage": "This is a sample error message"
}`

