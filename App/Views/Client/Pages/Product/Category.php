<?php


namespace App\Views\Client\Pages\Product;


use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;


class Category extends BaseView
{
    public static function render($data = null)
    {

?>
<style>
    /* Consistent Product Card Styles */
.card {
    transition: box-shadow 0.3s, transform 0.3s;
}

.card:hover {
    box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}

.card-title {
    font-weight: 700;
    color: #2c3e50;
    font-size: 1.1rem;
}

.card-footer {
    border-top: 1px solid #f0f0f0;
}

.btn-outline-info, .btn-outline-success {
    font-size: 0.85rem;
    padding: 0.4rem 0.75rem;
}

</style>

<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Sidebar for Categories -->
        <div class="col-md-3">
            <div class="sticky-top">
                <?php ComponentsCategory::render($data['categories']); ?>
            </div>
        </div>

        <!-- Product Section -->
        <div class="col-md-9">
            <h1 class="text-center mb-4 font-weight-bold text-uppercase">Sản phẩm</h1>
            
            <?php if (isset($data) && isset($data['products']) && $data && $data['products']) : ?>
                <h2 class="text-center mb-4"><?= $data['products'][0]['category_name'] ?></h2>

                <!-- Product Grid -->
                <div class="row">
                    <?php foreach ($data['products'] as $item) : ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm border-0">
                                <img 
                                    src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" 
                                    
                                    class="card-img-top" 
                                    alt="<?= $item['name'] ?>" 
                                    style="height: 250px; object-fit: cover;"
                                >
                                <span class="badge bg-danger position-absolute top-1 start-0 m-0">Sale</span>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $item['name'] ?></h5>
                                    <?php if ($item['discount_price'] > 0) : ?>
                                        <p class="text-muted mb-1">Giá gốc: <strike><?= number_format($item['price']) ?> đ</strike></p>
                                        <p>Giá giảm: <strong class="text-danger"><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong></p>
                                    <?php else : ?>
                                        <p>Giá tiền: <strong><?= number_format($item['price']) ?> đ</strong></p>
                                    <?php endif; ?>
                                </div>
                                <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                    <a href="/products/<?= $item['id'] ?>" class="btn btn-sm btn-outline-info">Chi tiết</a>
                                    <form action="#" method="post">
                                        <input type="hidden" name="method" value="POST">
                                        <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php else : ?>
                <h3 class="text-center text-danger mt-4">Không có sản phẩm</h3>
            <?php endif; ?>
        </div>
    </div>
</div>



<?php

    }
}
