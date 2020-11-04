# Rate Limiting

Rate limiting is the control of the number of requests per unit time. This is to ensure we make our API accessible without downtime for all users.

We rate limit our API based against a user,  


HTTP 429 Too Many Requests response status code

Too Many Attempts.
< X-RateLimit-Limit: 3
< X-RateLimit-Remaining: 0
< Retry-After: 599

Any attempts to cirmcumvent rate limiting will result in your account being banned from our API platform.
