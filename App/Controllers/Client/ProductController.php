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
    // Hiển thị danh sách sản phẩm
    public static function index()
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();

        // Phân trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 8; // Hiển thị 8 sản phẩm mỗi trang (trang chính)
        $offset = ($page - 1) * $limit;

        // Lấy sản phẩm phân trang
        $products = $product->getPaginatedProducts($offset, $limit);
        $totalProducts = $product->countTotalProducts();
        
        // Tính số trang
        $totalPages = $totalProducts > 6 ? ceil($totalProducts / $limit) : 1;

        $data = [
            'products' => $products,
            'categories' => $categories,
            'pagination' => [
                'current_page' => $page,
                'total_pages' => $totalPages
            ]
        ];

        Header::render();
        Index::render($data);
        Footer::render();
    }

    // Chi tiết sản phẩm
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

    // Hiển thị sản phẩm theo danh mục
    public static function getProductByCategory($id)
    {
        $category = new Category();
        $categories = $category->getAllCategoryByStatus();

        $product = new Product();

        // Lấy tất cả sản phẩm theo danh mục và trạng thái
        $products = $product->getAllProductByCategoryAndStatus($id);

        // Phân trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 4; // Hiển thị 4 sản phẩm mỗi trang
        $offset = ($page - 1) * $limit;

        // Tính tổng số sản phẩm và số trang
        $totalProducts = count($products); // Số sản phẩm có trong danh mục
        $totalPages = $totalProducts > 4 ? ceil($totalProducts / $limit) : 1; // Tính số trang

        // Lấy sản phẩm cho trang hiện tại
        $productsToShow = array_slice($products, $offset, $limit);

        $pagination = [
            'current_page' => $page,
            'total_pages' => $totalPages
        ];

        $data = [
            'products' => $productsToShow,
            'categories' => $categories,
            'pagination' => $pagination
        ];

        Header::render();
        ProductCategory::render($data);
        Footer::render();
    }
}
