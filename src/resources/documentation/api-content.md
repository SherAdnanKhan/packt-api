# Content  

Provides access based on entitlement to our product content. Entitlements are set up on a user-by-user basis and can be requested via the support form on the api dashboard or via the partners team.

## Permissions

You will need the **Content (CONTENT)** or **All Content (ALLCONTENT)** permission to use this end point. In order to use the 'Get Content' endpoint you should also have entitlements setup.

## 

## Get Content   <sub>GET</sub>

Allows you to download content files of our products in different formats, epub, pdf, video.

> /api/v1/products/{id}/files/{type}

#### **Sample Response**
No response to output, file is provided in relevant format for automatic download.

#### **Parameters**

| Field | Description                                               | Optional |
| ----- | --------------------------------------------------------- | -------- |
| id | 	Product ID or ISBN code                                      | N        |
| type | epub, pdf or video       | N        |


[comment]: <> (Entitlements)

[comment]: <> (Get a list of products allowed to access)

