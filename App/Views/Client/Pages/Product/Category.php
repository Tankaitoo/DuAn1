<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;
use App\Views\Client\Components\Category as ComponentsCategory;

class Category extends BaseView
{
    public static function render($data = null)
    {

?>
<link rel="stylesheet" href="/public/assets/client/css/styles.css">

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
            <?php if (!empty($data['products'])) : ?>
                <h1 class="text-center mb-4 fw-bold text-uppercase">Danh sách sản phẩm</h1>

                <div class="card-container">
                    <?php foreach ($data['products'] as $item) : ?>
                        <div class="col mb-4">
                            <div class="card shadow-sm border-0">
                                <!-- Hình ảnh sản phẩm -->
                                <div class="position-relative">
                                    <?php if ($item['discount_price'] > 0) : ?>
                                        <span class="badge bg-danger position-absolute top-0 start-0">Sale</span>
                                    <?php endif; ?>
                                    <img src="<?= APP_URL ?>/public/uploads/products/<?= $item['image'] ?>" 
                                         class="card-img-top" 
                                         alt="<?= $item['name'] ?>" 
                                         style="object-fit: cover;">
                                </div>

                                <!-- Nội dung sản phẩm -->
                                <div class="card-body text-center">
                                    <h5 class="card-title text-truncate"><?= $item['name'] ?></h5>
                                    <?php if ($item['discount_price'] > 0) : ?>
                                        <p class="mb-1 text-muted"><del><?= number_format($item['price']) ?> đ</del></p>
                                        <p class="text-danger fw-bold"><?= number_format($item['price'] - $item['discount_price']) ?> đ</p>
                                    <?php else : ?>
                                        <p class="text-primary fw-bold"><?= number_format($item['price']) ?> đ</p>
                                    <?php endif; ?>
                                </div>

                                <!-- Nút hành động -->
                                <div class="card-footer bg-white border-0 text-center">
                                    <a href="/products/<?= $item['id'] ?>" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if ($data['pagination']['total_pages'] > 1) : ?>
                    <nav class="mt-4">
                        <ul class="pagination justify-content-center">
                            <?php 
                            $currentPage = $data['pagination']['current_page'];
                            $totalPages = $data['pagination']['total_pages'];

                            // Nút "Trang trước"
                            if ($currentPage > 1) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $currentPage - 1 ?>">Trước</a>
                                </li>
                            <?php else : ?>
                                <li class="page-item disabled">
                                    <span class="page-link">Trước</span>
                                </li>
                            <?php endif; ?>

                            <!-- Các trang -->
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Nút "Trang sau" -->
                            <?php if ($currentPage < $totalPages) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Tiếp</a>
                                </li>
                            <?php else : ?>
                                <li class="page-item disabled">
                                    <span class="page-link">Tiếp</span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php else : ?>
                <h3 class="text-center text-danger">Không có sản phẩm</h3>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php

    }
}
?>
