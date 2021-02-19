<?php

/**
 * @description Find more http status here, https://gist.github.com/danmatthews/1379769
 */
return [
    'nameAndDescription' => [
        'api' => [
            'test' => [
                'Test' => 'Test'
            ],
            'products.index' => [
                'Product' => 'List Products'
            ],
            'products.show' => [
                'Product' => 'GET :productID'
            ],
            'authors.index' => [
                'Author' => 'List Authors'
            ],
            'coverImages' => [
                'Product' => 'GET :productID Image'
            ],
            'productAuthors' => [
                'Product' => 'GET :productID Authors'
            ],
            'productFiles' => [
                'Content' => 'Download :productID, :fileType'
            ],
            'productPrice' => [
                'Product' => 'GET :productID price in :code'
            ]
        ]
    ],
    'httpStatusText' => [
        '200' => 'OK',
        '201' => 'Created',
        '202' => 'Accepted',
        '400' => 'Bad Request',
        '403' => 'Forbidden',
        '404' => 'Not Found',
        '429' => 'Rate Limit Exceeded'
    ]
];
