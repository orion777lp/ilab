## Тестовое задание iLab

Дефолт проект Laravel

Requirements:
    
    Laravel v11.35.1 
    PHP v8.3.12

Start

    php artisan migrate
    php artisan serve

        .env настроен на database.sqlite

подключены два API маршрута

    - GET /api/product          - список всех продуктов
    - POST /api/product/add     - добавление продукта

Структура JSON

    {
        "product": [
            {
                "id":"3 id",
                "name":"3 name",
                "price":11,
                "currency":"3 currency",
                "quantity":1,
                "category_name":"3 categoryName",
                "barcode":"3 barcode",
                "description":"3 description",
                "images":[
                    "images 1",
                    "images 2"
                ]
            },
            {
                "id":"1 id",
                "name":"1 name",
                "price":11,
                "currency":"1 currency",
                "quantity":1,
                "category_name":"1 categoryName",
                "barcode":"1 barcode",
                "description":"1 description",
                "images":[
                    "images 1",
                    "images 2"
                ]
            }
        ]
    }
