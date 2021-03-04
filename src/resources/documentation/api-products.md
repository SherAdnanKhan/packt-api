# Products  



Provides access to data across products

## Permissions

You will need the **Product Information (PI)** permission to use this end point.

## List Products   <sub>GET</sub>

Fetches all products available in our catalog

> /api/v1/products

#### **Sample Response**

```json
{
    "current_page": 1,
    "first_page_url": "https://api.packt.com/api/v1/products?page=1",
    "from": 1,
    "last_page": 91,
    "last_page_url": "https://api.packt.com/api/v1/products?page=91",
    "next_page_url": "https://api.packt.com/api/v1/products?page=2",
    "path": "https://api.packt.com/api/v1/products",
    "per_page": 100,
    "prev_page_url": null,
    "to": 100,
    "total": 9018,
    "products" : [
        {
            "id": "9781789956177",
            "isbn13": "9781789956177",
            "title": "Advanced Deep Learning with Python",
            "publication_date": "2019-12-12T00:00:00.000Z",
            "authors": [ "Ivan Vasilev" ],
            "category": "Data",
            "concept": "Deep Learning",
            "language": "python",
            "language_version": "3.7",
            "tool": "TensorFlow",
            "vendor": "Apache"    
        }    
    ]
}
```

#### **Parameters**

| Field | Description                                               | Optional |
| ----- | --------------------------------------------------------- | -------- |
| page | Provide a page param to cycle through further results | Y        |
| limit | Number of products to return, default 100, max 10000      | Y        |

#### **Returned Values**

| Field            | Description                                                  | Type             |
| ---------------- | ------------------------------------------------------------ | ---------------- |
| id               | Product ID                                                   | string           |
| isbn13           | ISBN 13                                                      | string           |
| title            | The title of this product                                    | string           |
| publication_date | When this product was published                              | date             |
| authors          | List of author names for this title (Optional)               | array of strings |
| category         | The category this title sits under (eg Data, Cloud & Networking, Game Development, IoT & Hardware, Mobile, Programming, Security Web Development, Business & Other...) | string           |
| concept          | A list of concepts that this title covers, eg DevOps, Ecommerce etc.. (Optional) | array of strings |
| language         | The primary language covered by this title , further languages may be covered, please use get product API for this. (eg Java, Python, etc) (Optional) | string           |
| langauge_version | The version of the primary language covered by this title (Optional) | string           |
| tool             | The primary tool or framework covered by this title, eg Flutter,  Grails etc (Optional) | string           |
| vendor           | The primary vendor that relates to this title Eg Microsoft, IBM etc | string           |



## Get a Product   <sub>GET</sub>

Retrieves product information about a single product  

> /api/v1/products/{id}

#### **Sample Response**

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
    "product_type": "Book",
    "tagline": "Gain expertise in advanced deep learning domains such as neural networks, meta-learning, graph neural networks, and memory augmented neural networks using the Python ecosystem",
    "pages": 468,
    "publication_date": "2019-12-12T00:00:00.000Z",
    "length": "14 hours 2 minutes",
    "learn": "<ul><li>Cover advanced and state-of-the-art neural network architectures\r</li><li>Understand the theory and math behind neural networks\r</li><li>Train DNNs and apply them to modern deep learning problems\r</li><li>Use CNNs for object detection and image segmentation\r</li><li>Implement generative adversarial networks (GANs) and variational autoencoders to generate new images\r</li><li>Solve natural language processing (NLP) tasks, such as machine translation, using sequence-to-sequence models\r</li><li>Understand DL techniques, such as meta-learning and graph neural networks</li></ul>",
    "features": "<ul><li>Get to grips with building faster and more robust deep learning architectures\r</li><li>Investigate and train convolutional neural network (CNN) models with GPU-accelerated libraries such as TensorFlow and PyTorch\r</li><li>Apply deep neural networks (DNNs) to computer vision problems, NLP, and GANs</li></ul>",
    "description": "<p>In order to build robust deep learning systems, you’ll need to understand everything from how neural networks work to training CNN models. In this book, you’ll discover newly developed deep learning models, methodologies used in the domain, and their implementation based on areas of application. \r</p><p>\r</p><p>You’ll start by understanding the building blocks and the math behind neural networks, and then move on to CNNs and their advanced applications in computer vision. You'll also learn to apply the most popular CNN architectures in object detection and image segmentation. Further on, you’ll focus on variational autoencoders and GANs. You’ll then use neural networks to extract sophisticated vector representations of words, before going on to cover various types of recurrent networks, such as LSTM and GRU. You’ll even explore the attention mechanism to process sequential data without the help of recurrent neural networks (RNNs). Later, you’ll use graph neural networks for processing structured data, along with covering meta-learning, which allows you to train neural networks with fewer training samples. Finally, you’ll understand how to apply deep learning to autonomous vehicles.\r</p><p>\r</p><p>By the end of this book, you’ll have mastered key deep learning concepts and the different applications of deep learning models in the real world.</p>",
    "authors": [
        {        
            "name": "Ivan Vasilev",
            "about": "Ivan Vasilev started working on the first open source Java deep learning library with GPU support in 2013. The library was acquired by a German company, where he continued to develop it. He has also worked as a machine learning engineer and researcher in the area of medical image classification and segmentation with deep neural networks. Since 2017, he has been focusing on financial machine learning. He is working on a Python-based platform that provides the infrastructure to rapidly experiment with different machine learning algorithms for algorithmic trading. Ivan holds an MSc degree in artificial intelligence from the University of Sofia, St. Kliment Ohridski.\n",
            "profile_url": "https://www.packtpub.com/authors/ivan-vasilev-1bd2086d-355e-1071-0e08-55d2d72f8c14"
        }
    ],
    "url": "https://packtpub.com/data/advanced-deep-learning-with-python",

    "category": "Data",
    "concept":  "Deep Learning",
    "expertise":  "Beginner",
    
    "languages": [
        {
            "name" : "Python",
            "version" : "3.7",
            "primary" : true,
            "expertise" : "Beginner"
        }
    ],
    
    "tools": [
        {
            "name" : "TensorFlow",
            "vendor" : "Google",
            "type" : "Framework",
            "version" : "2.3",
            "language" : "Python",
            "expertise" : "Beginner",
            "primary" : true
        }
    ],
    
    "jobroles": [
        {
            "name" : "Machine Learning Engineer",
            "expertise" : "Intermediate"            
        }
    ],        

    "vendors": [
        {
            "name" : "Apache",
            "primary" : true
        }
    ]            
}
```

#### **Parameters**

| Field | Description             | Optional |
| ----- | ----------------------- | -------- |
| id    | Product ID or ISBN code | N        |

#### **Returned Values**

| Field | Description    | Type    |
| ----- | -------------- | ------- |
| id    | Product ID | string  |
| isbn13 and isbn10 | ISBN-13 and ISBN-10 identifiers, ISBN-10  if in doubt please always use ISBN-13, note the ISBN-13 is not guaranteed to be the same as the product id. | string |
| isbns | ISBN variants of our published product types, eg print, ebook, video etc. | string |
| title            | The title of this product                                    | string           |
| product_type | Represents the type of product this is, eg Video, Book, Workshop etc. | string |
| tagline | Short description of this product (optional) | string |
| pages | Number of pages found in the print version of this product (optional) | number |
| publication_date | When this product was published                              | date             |
| length | Calculated time to consume this content, if video is the video run length. (optional) | time |
| learn | HTML bullet point list of key learnings from this title (optional) | string |
| features | HTML bullet point list about features for this product (optional) | string |
| description | HTML text with detailed description for this product (optional) | string |
| authors          | List of authors for this title, including name, a short biography and a link to Packt author page. (Optional) | array of strings |
| url | Link to product page on Packt site. | URL |
| category         | The category this product sits under (eg Data, Cloud & Networking, Game Development, IoT & Hardware, Mobile, Programming, Security Web Development, Business & Other...) | string           |
| concept         | Concepts are topic labels that denote what activities a product is teaching a user.  eg DevOps, Ecommerce etc.. | array of strings |
| expertise | The level of concept expertise needed to consume this product. | string |
| languages        | The languages covered by this title. (eg Java, Python, etc), languages may be marked as primary, have a version and an expertise level. (Optional) | Array map of strings |
| tools | Broadly speaking, a Tool is the thing you use to work on a Concept. A product can be associated to a number of tools. A tool can also include a tool type, vendor, version, language and a level of expertise related to using that tool. (Optional) | Array map of strings |
| jobroles          | A list of job roles that could be assigned to this product. An expertise level reflects the level of expertise for this job role against this product. | Array map of strings |
| vendors          | A list of vendors that relate to this title Eg Microsoft, IBM etc (Optional) | Array map of strings |


## Product Pricing (RRP)   <sub>GET</sub>

Retrieves RRP pricing for a given product and it's variations e.g Print, Ebook etc.

> /api/v1/products/{id}/price/{code}

#### **Sample Response**
```json
{
    "prices": {
        "print": {
            "USD": "44.99",
            "GBP": "33.99",
            "EUR": "33.99",
            "INR": "3101.99",
            "AUD": "64.99"
        },
        "ebook": {
            "USD": "31.99",
            "GBP": "23.99",
            "EUR": "23.99",
            "INR": "2170.99",
            "AUD": "45.99"
        }
    }
}
```

#### **Parameters**

| Field | Description             | Optional |
| ----- | ----------------------- | -------- |
| id    | Product ID or ISBN code | N        |
| code    | ISO 4217 Currency Code, currently USD, GBP, EUR, INR & AUD are accepted. | Y        |


## Cover Image   <sub>GET</sub>

Retrieves the cover image for the product.

> GET /api/v1/products/{id}/cover/large


> GET /api/v1/products/{id}/cover/small

#### **Parameters**

| Field | Description             | Optional |
| ----- | ----------------------- | -------- |
| id    | Product ID or ISBN code | N        |
  
Large denotes our full size image for this cover, this is the highest resolution that this cover is available in.

Small denotes a 240x300px thumbnail cover image.

The cover image will be returned either as a jpg or png with the respective content-type set as image/jpeg or image/png respectively.
