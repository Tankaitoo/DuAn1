<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>
<style>
    /* Thêm hiệu ứng cho các giá tiền */
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

/* Cải tiến hiển thị hình ảnh */
.product-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

/* Thêm hiệu ứng cho nút Thêm vào giỏ hàng */
.btn-lg {
    background-color: #28a745;
    color: white;
    border-radius: 5px;
}
.btn-lg:hover {
    background-color: #218838;
}

/* Cải tiến phần bình luận */
.comment-widgets {
    margin-top: 30px;
}
.comment-text {
    background-color: #f7f7f7;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 10px;
}
.comment-footer {
    display: flex;
    justify-content: space-between;
}

</style>
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Image Section -->
        <div class="col-md-6">
            <div class="product-image">
                <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['products']['image'] ?>" alt="<?= $data['products']['name'] ?>" class="img-fluid">
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="col-md-6">
            <h2 class="product-title"><?= $data['products']['name'] ?></h2>

            <?php if ($data['products']['discount_price'] > 0) : ?>
                <div class="price-section">
                    <h4 class="original-price"><strike><?= number_format($data['products']['price']) ?> đ</strike></h4>
                    <h3 class="discounted-price"><?= number_format($data['products']['price'] - $data['products']['discount_price']) ?> đ</h3>
                </div>
            <?php else : ?>
                <div class="price-section">
                    <h3 class="regular-price"><?= number_format($data['products']['price']) ?> đ</h3>
                </div>
            <?php endif; ?>

            <p><strong>Danh mục:</strong> <?= $data['products']['category_name'] ?></p>

            <!-- Display Condition -->
           

            <!-- Display Color Options (if applicable) -->
            <div class="color-options">
                <strong>Chọn màu:</strong>
                <select class="form-control" name="color_id">
                    <?php foreach ($data['colors'] as $color) : ?>
                        <option value="<?= $color['id'] ?>" style="background-color: <?= $color['color_code'] ?>;">
                            <?= $color['color_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <form action="#" method="post" class="mt-3">
                <input type="hidden" name="method" value="POST">
                <input type="hidden" name="id" value="<?= $data['products']['id'] ?>" required>
                <button type="submit" class="btn btn-success btn-lg">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>

    <!-- Product Description -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <strong>Mô Tả</strong>
                </div>
                <div class="card-body">
                    <p><?= $data['products']['description'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">Bình luận mới nhất</h4>
                </div>
                <div class="comment-widgets">
                    <?php if (isset($data['comments']) && !empty($data['comments'])) : ?>
                        <?php foreach ($data['comments'] as $item) : ?>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">
                                    <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?? 'userimg.jpg' ?>" alt="user" width="50" class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><?= $item['name'] ?> - <?= $item['username'] ?></h6>
                                    <p><?= $item['content'] ?></p>
                                    <span class="text-muted"><?= $item['date'] ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h6 class="text-center text-danger">Chưa có bình luận</h6>
                    <?php endif; ?>

                    <?php if ($is_login) : ?>
                        <!-- Comment Form -->
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="<?= APP_URL ?>/public/uploads/users/userimg.jpg" alt="user" width="50" class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Username</h6>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="comment">Bình luận:</label>
                                        <textarea class="form-control" name="content" id="comment" rows="3" placeholder="Nhập bình luận..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
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
