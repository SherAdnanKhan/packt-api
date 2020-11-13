# Packt API

`ALPHA` 

This is the documentation for the current version of our API, v1 (alpha).

We are currently developing this platform, so not all functionality is available right now, only functionality marked as `ALPHA` is available in this release.

Need an account? [Sign up now](/register). 

Requests should always be made over HTTPS. Connections cannot be made via HTTP. Please note that support for SSL 3.0 has been disabled and we recommend using TLS 1.2 or better.

All API access is accessed from `https://api.packt.com/`.  All data is sent and received as JSON.

## Quick Start

* Sign Up [here](/register)
* Create a token [here](/user/api-tokens)
* Get a list of all our products

```bash
curl -v "https://api.packt.com/api/v1/products?token=<yourtoken>"
```

* Enjoy...