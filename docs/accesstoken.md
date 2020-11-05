# Access Tokens

Packt API uses a simple approach for authentication using API tokens, without any complication of OAuth.

As an app developer, you need to include an access token in any request to Packt API. Note that access tokens are also called "bearer tokens."

You will need to [create an API token here](/user/api-tokens). We recommend that you create different tokens for each of your apps, allowing you to repudiate a token without significant impact.

## Access Token in Header

You can present your access token to consume the Packt API through the HTTP header. To do this, send the access token in the request as an **"Authorization" HTTP header**.

For example:

```bash
$ curl -H "Authorization: Bearer ylSkZIjbdWybfs4fUQe9sd30LH5Z" https://api.packt.com/api/v1/products
```

## Access Token as a Parameter

You can present your access token as a parameter. To do this, send the access token using a parameter key **token**.

For example:

```bash
$ curl https://api.packt.com/api/v1/products?token=ylSkZIjbdWybfs4fUQe9sd30LH5Z
```

## Access Permissions

All our API's are restricted against one or more permissions. 

You are able to associate a permission against your API key during key creation, you may have multiple keys each associated with a different set of permissions. 

All API users have access to our Product Information API. You will need to raise a support request with our Partners team to be assigned additional permissions.


### Sandbox

- Not a permission per-se but should be used when testing.
- All requests here will be transient


### Product Information (PI)
  - Access to our catalogue and product information

### Content (CONTENT)
  - Can retrieve our titles through our API 
  - ePub, PDF, Colour PDF formats supported
  - You will need to be allocated titles, see entitlement endpoint in content.

### All Content (ALLCONTENT)

* Multi Pass!
* Can retrieve any of our titles through our API without checks on entitlements
* You can access any format available..

### Store (STORE)
  - Ability to transact through this API, be able to place orders and retrieve order status.
  - (Future access)
### Super User (SU)
  - Reserved for our administrators and has unfettered access to the entire system. 




These permissions will be made available based on your needs. Please contact support if you require access to any of these permissions.
