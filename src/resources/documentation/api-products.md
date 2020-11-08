# Products

Provides access to data across products

## Permissions

You will need the **Product Information (PI)** permission to use this end point.

## List Products `ALPHA`

Fetches all products in our catelogue

**URL**

> GET /api/products

**Sample Response**

```json
JSON Goes Here
```

**Parameters**

| Field | Description                                               | Optional |
| ----- | --------------------------------------------------------- | -------- |
| start | Start position used for paginating order list. Default 0. | Y        |
| limit | Number of products to return, default 100, max 10000      | Y        |

**Returned Values**

| Field | Description    | Type    |
| ----- | -------------- | ------- |
| id    | Product ID     | string  |
| isbn  | ISBN 13        | integer |
| ...   | more goes here |         |



## Get a Product `ALPHA`

Retrieves product information about a single product

**URL**

> GET /api/products/{id}

**Sample Response**

```json
JSON Goes Here
```

**Parameters**

| Field | Description             | Optional |
| ----- | ----------------------- | -------- |
| id    | Product ID or ISBN code | N        |

**Returned Values**

| Field | Description    | Type    |
| ----- | -------------- | ------- |
| id    | Product ID     | string  |
| isbn  | ISBN 13        | integer |
| ...   | more goes here |         |



Author Info `ALPHA` 

Returns all authors information assigned to this product.

In a List



Price 

Get price of title given a country, default is US.



Reviews

Get reviews score for this title



Packt Rank

Get Packt Rank

