<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
        $product = $data['products'] ?? [];
        $price = (float)($product['price'] ?? 0);
        $discount_price = (float)($product['discount_price'] ?? 0);
        $final_price = $price > 0 && $discount_price > 0 ? $price - $discount_price : $price;
?>
<style>
/* Styling cải tiến */
.price-section .original-price {
    text-decoration: line-through;
    color: gray;
}
.price-section .discounted-price {
    color: #e74c3c;
    font-size: 1.5em;
    font-weight: bold;
}
.price-section .regular-price {
    color: #2ecc71;
    font-size: 1.5em;
    font-weight: bold;
}
.product-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}
.btn-lg {
    background-color: #28a745;
    color: white;
    border-radius: 5px;
}
.btn-lg:hover {
    background-color: #218838;
}
.comment-text {
    background-color: #f7f7f7;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 10px;
}
</style>

<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Image Section -->
        <div class="col-md-6">
            <div class="product-image">
                <img src="<?= APP_URL ?>/public/uploads/products/<?= $product['image'] ?? 'default.jpg' ?>" 
                     alt="<?= $product['name'] ?? 'Sản phẩm' ?>" class="img-fluid">
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="col-md-6">
            <h2 class="product-title"><?= $product['name'] ?? 'Sản phẩm không có tên' ?></h2>

            <?php if ($discount_price > 0) : ?>
                <div class="price-section">
                    <h4 class="original-price"><?= number_format($price) ?> đ</h4>
                    <h3 class="discounted-price"><?= number_format($final_price) ?> đ</h3>
                </div>
            <?php else : ?>
                <div class="price-section">
                    <h3 class="regular-price"><?= number_format($price) ?> đ</h3>
                </div>
            <?php endif; ?>

            <p><strong>Danh mục:</strong> <?= $product['category_name'] ?? 'Không rõ' ?></p>

            <!-- Chọn màu -->
            <div class="color-options">
                <strong>Chọn màu:</strong>
                <select class="form-control" name="color_id">
                    <?php foreach ($data['colors'] ?? [] as $color) : ?>
                        <option value="<?= $color['id'] ?>" style="background-color: <?= $color['color_code'] ?>;">
                            <?= $color['color_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="quantity mt-3">
        <strong>Số lượng:</strong>
        <div class="input-group mt-2" style="max-width: 150px;">
            <input type="number" name="quantity" class="form-control text-center" value="1" min="1" id="quantity-input">
        </div>
    </div>
            <form action="/cart/add" method="post" class="mt-3">
            <input type="hidden" name="method" value="POST">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?? '' ?>">
                <input type="hidden" name="image" value="<?= $product['image'] ?? '' ?>">
                <input type="hidden" name="name" value="<?= $product['name'] ?? '' ?>">
                <input type="hidden" name="price" value="<?= $final_price ?>">
                <button type="submit" class="btn btn-lg">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>

    <!-- Mô tả sản phẩm -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <strong>Mô tả</strong>
                </div>
                <div class="card-body">
                    <p><?= $product['description'] ?? 'Không có mô tả.' ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bình luận -->
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">Bình luận mới nhất</h4>
                </div>
                <div class="comment-widgets">
                    <?php if (!empty($data['comments'])) : ?>
                        <?php foreach ($data['comments'] as $item) : ?>
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?? 'default-avatar.jpg' ?>" 
                                         alt="user" width="50" class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><?= $item['name'] ?? 'Ẩn danh' ?></h6>
                                    <p><?= $item['content'] ?? '' ?></p>
                                    <span class="text-muted"><?= $item['date'] ?? '' ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h6 class="text-center text-danger">Chưa có bình luận</h6>
                    <?php endif; ?>

                    <?php if ($is_login) : ?>
                        <!-- Form bình luận -->
                        <div class="d-flex flex-row comment-row mt-3">
                            <div class="p-2">
                                <img src="<?= APP_URL ?>/public/uploads/users/userimg.jpg" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Bạn</h6>
                                <form action="/comment/add" method="post">
                                    <textarea class="form-control" name="content" placeholder="Nhập bình luận..." rows="3" required></textarea>
                                    <button type="submit" class="btn btn-cyan btn-sm mt-2">Gửi</button>
                                </form>
                            </div>
                        </div>
                    <?php else : ?>
                        <h6 class="text-center text-danger">Vui lòng đăng nhập để bình luận</h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
}