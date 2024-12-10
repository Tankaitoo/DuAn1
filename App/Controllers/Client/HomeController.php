<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Home;
use App\Views\Client\Layouts\Header;
use App\Models\Product;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {   
        $product = new Product();
        $products = $product->getAllProductByStatus();

        $data = [
            'products' => $products,
        ];
        Header::render();

        Home::render($data);
        Notification::render();
        NotificationHelper::unset();
        Footer::render();
    }
}
