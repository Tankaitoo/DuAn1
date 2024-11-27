<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>

        <style>
            .card:hover {
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
                transform: translateY(-5px);
                transition: all 0.3s ease;
            }

            .col-md-9 h1 {
                font-size: 1.2rem;
                color: #34495e;
            }

            .badge.bg-danger {
                background-color: #e74c3c;
                font-size: 0.6em;
            }

            .card-title {
                font-weight: bold;
                color: #34495e;
            }

            .card-link {
                text-decoration: none;
                color: inherit;
            }

            .card-link:hover .card-title {
                color: #3498db;
            }
        </style>

        <div class="container mt-5 mb-5">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="sticky-top">
                        <?php
                        Category::render($data['categories']);
                        ?>
                    </div>
                </div>

                <!-- Products Section -->
                <div class="col-md-9">
                    <?php if (!empty($data['products'])) : ?>
                        <h1 class="text-center mb-4 font-weight-bold text-uppercase">Sản phẩm</h1>

                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php foreach ($data['products'] as $item) : ?>
                                <div class="col">
                                    <!-- Link bao quanh toàn bộ sản phẩm -->
                                    <a href="/products/<?= $item['id'] ?>" class="card-link">
                                        <div class="card h-100 shadow-sm border-0">
                                            <div class="position-relative">
                                                <span class="badge bg-danger position-absolute top-1 start-0 m-0">Sale</span>
                                                <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" 
                                                    class="card-img-top" 
                                                    alt="<?= $item['name'] ?>" 
                                                    style="height: 200px; object-fit: cover;">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $item['name'] ?></h5>
                                                <?php if ($item['discount_price'] > 0) : ?>
                                                    <p>Giá gốc: <strike><?= number_format($item['price']) ?> đ</strike></p>
                                                    <p>Giá giảm: <strong class="text-danger"><?= number_format($item['price'] - $item['discount_price']) ?> đ</strong></p>
                                                <?php else : ?>
                                                    <p>Giá tiền: <?= number_format($item['price']) ?> đ</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    <?php else : ?>
                        <h3 class="text-center text-danger">Không có sản phẩm</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php
    }
}
