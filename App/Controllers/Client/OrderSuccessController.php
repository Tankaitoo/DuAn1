<?php

namespace App\Controllers\Client;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Product\Category as ProductCategory;
use App\Views\Client\Pages\Product\Detail;
use App\Views\Client\Checkout\OrderSuccess;

class OrderSuccessController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        OrderSuccess::render();
        Footer::render();
    }

    
}
