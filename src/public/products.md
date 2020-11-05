# Products

Provides access to data across products

## Permissions

Product Information (PI)

## Get a Product

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



## List Products

**URL**

> GET /api/products


**Sample Response**

```json
{
    "one": 2,
    "three": {
        "point_1": "point_2",
        "point_3": 3.4
    },
    "list": [
        "one",
        "two",
        "three"
    ]
}
```

**Parameters**

| Field | Description             | Optional |
| ----- | ----------------------- | -------- |
| start    | Start position used for paginating order list. Default 0. | Y        |
| limit    | Number of products to return, default 10000, max 20000 | Y        |

**Returned Values**

| Field | Description    | Type    |
| ----- | -------------- | ------- |
| id    | Product ID     | string  |
| isbn  | ISBN 13        | integer |
| ...   | more goes here |         |
