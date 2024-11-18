<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Cart extends BaseView
{
    public static function render($data = null)
    {
?>

    <style>
        .cart .table img {
        max-width: 80px;
    }
    .cart h2 {
        color: #007bff;
    }
    .cart .btn-danger {
        background-color: #dc3545;
    }
    .cart .text-danger {
        font-weight: bold;
    }
        #cart-section { background-color: #f8f9fa; border-radius: 8px; padding: 30px; }
        .table thead th { background-color: #007bff; color: #fff; }
        .table td, .table th { vertical-align: middle; }
        .table .remove-btn { color: #dc3545; cursor: pointer; }
        .total-price { font-weight: bold; }
    </style>
</head>
<body>

<section class="cart container py-5">
    <h2 class="text-center mb-4">Giỏ hàng của bạn</h2>
    
    <!-- Kiểm tra nếu giỏ hàng trống -->
    <?php if (empty($cartItems)): ?>
        <p class="text-center">Giỏ hàng của bạn hiện đang trống.</p>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td>
                                <img src="<?= $item['image_url'] ?>" alt="Product Image" class="img-fluid" style="max-width: 80px;">
                            </td>
                            <td><?= $item['name'] ?></td>
                            <td><?= number_format($item['price'], 0, ',', '.') ?>₫</td>
                            <td>
                                <input type="number" class="form-control" value="<?= $item['quantity'] ?>" min="1">
                            </td>
                            <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>₫</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Tổng cộng -->
        <div class="text-right">
            <h4 class="mt-3">Tổng tiền: 
                <span class="text-danger">
                    <?= number_format($totalAmount, 0, ',', '.') ?>₫
                </span>
            </h4>
            <a href="/checkout" class="btn btn-primary mt-3">Tiến hành thanh toán</a>
        </div>
    <?php endif; ?>
</section>


<?php
    }
}
?>
