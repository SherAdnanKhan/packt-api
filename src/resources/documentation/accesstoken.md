# Access Tokens

Packt API uses a simple approach for authentication using API tokens, without any complication of OAuth.

You need to include an access token in any request to Packt API. Note that access tokens are also called "bearer tokens." You can pass a token through the header or as a parameter in your request.

You will need to [create an API token here](/user/api-tokens). We recommend that you create different tokens for each of your apps, allowing you to repudiate a token if needed without significant impact.

We do not expire tokens, but do advise you rotate your tokens periodically.

## Access Token in Header

You can present your access token through the HTTP header. To do this, send the access token in the request as an **"Authorization" HTTP header**.

For example:

```bash
$ curl -H "Authorization: Bearer ylSkZIjbdWybfs4fUQe9sd30LH5Z" https://api.packt.com/api/v1/products
```

## Access Token as a Parameter

You can present your access token as a parameter instead. To do this, send the access token using the parameter key **token**.

For example:

```bash
$ curl "https://api.packt.com/api/v1/products?token=ylSkZIjbdWybfs4fUQe9sd30LH5Z"
```

## Sandbox Tokens

You are able to set a token as a sandbox token - you should do this if you are using a token in dev, test or stage. Use Sandbox tokens for testing.

This allows us to identify requests from test environments and ensures that any requests remain transient on our systems. All requests using sandbox tokens will  

- 
- Not a permission per-se but should be used when testing.
- All requests here will be transient

## Access Permissions

All our API's are restricted against an access permission.

You are able to associate a permission against your API key during key creation, you may have multiple keys each associated with a different set of permissions. Once assigned you cannot change this. There are no restrictions on how many access tokens you create.  

All API users have access to our Product Information API. You will need to raise a support request with our Partners team to be assigned additional permissions.

### Test (TEST)

* Access to test end point

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
