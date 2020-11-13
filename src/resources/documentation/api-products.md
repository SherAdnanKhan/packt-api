# Products

`ALPHA` 

Provides access to data across products

## Permissions

You will need the **Product Information (PI)** permission to use this end point.

## List Products `ALPHA`

Fetches all products in our catelogue

**URL**

> GET /api/products

**Sample Response**

```json

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
{
    "id": "9781789956177",
    "isbn13": "9781789956177",
    "isbn10": "178995617X",
    "isbns": {
        "print": "9781789956177",
        "ebook": "9781789952711"
    },
    "title": "Advanced Deep Learning with Python",
    "tagline": "Gain expertise in advanced deep learning domains such as neural networks, meta-learning, graph neural networks, and memory augmented neural networks using the Python ecosystem",
    "pages": 468,
    "publication_date": "2019-12-12T00:00:00.000Z",
    "length": "14 hours 2 minutes",
    "learn": "<ul><li>Cover advanced and state-of-the-art neural network architectures\r</li><li>Understand the theory and math behind neural networks\r</li><li>Train DNNs and apply them to modern deep learning problems\r</li><li>Use CNNs for object detection and image segmentation\r</li><li>Implement generative adversarial networks (GANs) and variational autoencoders to generate new images\r</li><li>Solve natural language processing (NLP) tasks, such as machine translation, using sequence-to-sequence models\r</li><li>Understand DL techniques, such as meta-learning and graph neural networks</li></ul>",
    "features": "<ul><li>Get to grips with building faster and more robust deep learning architectures\r</li><li>Investigate and train convolutional neural network (CNN) models with GPU-accelerated libraries such as TensorFlow and PyTorch\r</li><li>Apply deep neural networks (DNNs) to computer vision problems, NLP, and GANs</li></ul>",
    "description": "<p>In order to build robust deep learning systems, you’ll need to understand everything from how neural networks work to training CNN models. In this book, you’ll discover newly developed deep learning models, methodologies used in the domain, and their implementation based on areas of application. \r</p><p>\r</p><p>You’ll start by understanding the building blocks and the math behind neural networks, and then move on to CNNs and their advanced applications in computer vision. You'll also learn to apply the most popular CNN architectures in object detection and image segmentation. Further on, you’ll focus on variational autoencoders and GANs. You’ll then use neural networks to extract sophisticated vector representations of words, before going on to cover various types of recurrent networks, such as LSTM and GRU. You’ll even explore the attention mechanism to process sequential data without the help of recurrent neural networks (RNNs). Later, you’ll use graph neural networks for processing structured data, along with covering meta-learning, which allows you to train neural networks with fewer training samples. Finally, you’ll understand how to apply deep learning to autonomous vehicles.\r</p><p>\r</p><p>By the end of this book, you’ll have mastered key deep learning concepts and the different applications of deep learning models in the real world.</p>",
    "authors": [
        {
            "id": "102508",
            "name": "Ivan Vasilev",
            "about": "Ivan Vasilev started working on the first open source Java deep learning library with GPU support in 2013. The library was acquired by a German company, where he continued to develop it. He has also worked as a machine learning engineer and researcher in the area of medical image classification and segmentation with deep neural networks. Since 2017, he has been focusing on financial machine learning. He is working on a Python-based platform that provides the infrastructure to rapidly experiment with different machine learning algorithms for algorithmic trading. Ivan holds an MSc degree in artificial intelligence from the University of Sofia, St. Kliment Ohridski.\n",
            "profile_url": "https://www.packtpub.com/authors/ivan-vasilev-1bd2086d-355e-1071-0e08-55d2d72f8c14"
        }
    ],
    "url": "https://packtpub.com/data/advanced-deep-learning-with-python",
    "meta": {
        "category": {
            "category_name": "Data"
        },
        "concepts": {
            "concept_name": "Deep Learning"
        },
        "language": {
            "language_name": "python"
        },
        "languageVersion": {
            "language_version_name": "3.7"
        },
        "tool": {
            "tool_name": "TensorFlow"
        },
        "vendor": {
            "vendor": ""
        }
    }
}
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



## Author Info `ALPHA` 

Returns all authors information assigned to this product.


**URL**

> GET /api/products/{sku}/authors

**Sample Response**

```json
[
    {
        "id": "12969",
        "name": "Sebastian Raschka",
        "about": "Sebastian Raschka is an Assistant Professor of Statistics at the University of Wisconsin-Madison focusing on machine learning and deep learning research. Some of his recent research methods have been applied to solving problems in the field of biometrics for imparting privacy to face images. Other research focus areas include the development of methods related to model evaluation in machine learning, deep learning for ordinal targets, and applications of machine learning to computational biology.\n",
        "profile_url": "https://www.packtpub.com/authors/sebastian-raschka"
    },
    {
        "id": "30218",
        "name": "Vahid Mirjalili",
        "about": "Vahid Mirjalili obtained his Ph.D. in mechanical engineering working on novel methods for large-scale, computational simulations of molecular structures. Currently, he is focusing his research efforts on applications of machine learning in various computer vision projects at the Department of Computer Science and Engineering at Michigan State University. He recently joined 3M Company as a research scientist, where he uses his expertise and applies state-of-the-art machine learning and deep learning techniques to solve real-world problems in various applications to make life better.\n",
        "profile_url": "https://www.packtpub.com/authors/vahid-mirjalili"
    }
]
```


In a List `TODO`

## Price `TODO`

Get price of title given a country, default is US.`


## Reviews `TODO`

Get reviews score for this title

Packt Rank

Get Packt Rank

