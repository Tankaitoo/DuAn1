<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Pages\Product\Index;

class ProductController
{
    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        $categories = [
            [
                'id' => 1,
                'name' => 'Category 1',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Category 2',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Category 3',
                'status' => 0
            ],

        ];
        $products = [
            [
                'id' => 1,
                'name' => 'Product 1',
                'description' => 'Description Product 1',
                'price' => 100000,
                'discount_price' => 10000,
                'image' => 'product.jpg',
                'status' => 1
            ],
            [
                'id' => 2,
                'name' => 'Product 2',
                'description' => 'Description Product 2',
                'price' => 200000,
                'discount_price' => 20000,
                'image' => 'product.jpg',
                'status' => 1
            ],
            [
                'id' => 3,
                'name' => 'Product 3',
                'description' => 'Description Product 3',
                'price' => 300000,
                'discount_price' => 30000,
                'image' => 'product.jpg',
                'status' => 1
            ],

        ];
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        Header::render();

        Index::render($data);
        Footer::render();
    }
    public static function detail($id)
    {
        $product_detail = [
            'id' => $id,
            'name' => 'Product 1',
            'description' => 'Description Product 1',
            'price' => 100000,
            'discount_price' => 10000,
            'image' => 'product.jpg',
            'status' => 1
        ];
        $data = [
            'product' => $product_detail
        ];
        Header::render();

        Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id)
    {
    }
}
