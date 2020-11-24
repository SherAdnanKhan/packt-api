# Rate Limiting

Rate limiting is the control of the number of requests per unit time. This is to ensure we make our API accessible without downtime for all users.

We rate limit our API based against a user session. Your rate limit will be dependent on your needs, please do contact our Partners team if you need to increase this. 

If you exceed the rate limit we will return a `HTTP 429 Too Many Requests` response status code with the following payload.

```json
{ "errorMessage" : "Rate Limit Exceeded." }
```

We will also include in our headers the following rate limit information

```
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 3
```

Please play nice, any attempts to circumvent rate limiting will result in your account being banned from our API platform.

