<?php

namespace App\Models;

class CartModel
{
    // Lấy dữ liệu giỏ hàng (mẫu dữ liệu)
    public static function getCartItems()
    {
        
        // Dữ liệu mẫu về các sản phẩm trong giỏ hàng
        return [
            ['id' => 1, 'name' => 'Tai nghe Bluetooth', 'price' => 300000, 'quantity' => 1, 'image' => '/public/assets/client/images/product1.jpg'],
            ['id' => 2, 'name' => 'Pin dự phòng 10000mAh', 'price' => 500000, 'quantity' => 2, 'image' => '/public/assets/client/images/product2.jpg'],
        ];
    }
}
?>
