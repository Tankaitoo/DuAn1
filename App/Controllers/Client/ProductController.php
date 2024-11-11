<?php

namespace App\Controllers\Client;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
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
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();
        $products = $product->getAllProductByStatus();

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
        $product = new Product();
        $product_detail = $product->getOneProductByStatus($id);

        $comment = new Comment();
        $comments = $comment->get5CommentNewestByProductAndStatus($id);
        
        $data = [
            'products' => $product_detail,
            'comments' => $comments
        ];
 

        Header::render();
        Detail::render($data);
        Footer::render();
    }
    public static function getProductByCategory($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();
        $product = new Product();
        $products = $product->getAllProductByCategoryAndStatus($id);

        $data = [
            'products' => $products,
            'categories' => $categories
        ];

        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }
}
