# Test `ALPHA` 

This is a test end point for you to point any monitoring systems you have against. This end point is also useful to test and see the access level assigned to your token.

A token is required to call this end point.

**URL**

> GET /api/v1/test

## Sample Response
```json 
{
    "system": "OK",
    "token": "OK",
    "token_access": [
        "TEST",
        "PI"
    ],
    "token_last_used": "1 second ago"
}
```

