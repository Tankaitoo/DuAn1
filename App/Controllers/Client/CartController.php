<?php

namespace App\Controllers\Client;

use App\Models\CartModel;
use App\Views\Client\Cart;

class CartController
{
    public function index()
    {
        // Lấy danh sách sản phẩm từ model
        $cartItems = CartModel::getCartItems();

        // Truyền dữ liệu vào View để hiển thị
        Cart::render(['cartItems' => $cartItems]);
    }
}
?>
