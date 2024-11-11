<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Views\Admin\Home;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Client\Components\Notification;

class HomeController
{
    // hiển thị trang thống kê
    public static function index()
    {
        $user=new User;
        $total_user=$user->countTotalUser();

        $category=new Category();
        $total_category=$category->countTotalCategory();

        $product=new Product();
        $total_product=$product->countTotalProduct();

        $product_by_category=$product->countProductByCategory();

        $comment=new Comment();
        $total_comment=$comment->countTotalComment();
        // var_dump($total_user);
        $data=[
            'total_user'=>$total_user['total'],
            'total_category'=>$total_category['total'],
            'total_product'=>$total_product['total'],
            'total_comment'=>$total_comment['total'],
            'product_by_category'=>$product_by_category
        ];
// echo '<pre>';
//        var_dump($product_by_category);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Home::render($data);
        Footer::render();
    }
}
