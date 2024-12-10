<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
        // Lọc các sản phẩm có is_feature = 1
        $featuredProducts = array_filter($data['products'], function ($product) {
            return $product['is_feature'] == 1; // Kiểm tra trường is_feature
        });

?>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS for better styling -->
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Banner Styles */
        #banner {
            height: 60vh;
            background: url('/public/assets/client/images/banner1.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            position: relative;
        }
        #banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
            z-index: 1;
        }
        #banner .content {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }
        #banner h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }
        #banner p {
            font-size: 1.2rem;
        }

        /* Featured Products Section */
        #featured-products h2 {
            font-size: 2rem;
            margin-bottom: 25px;
        }
        
        /* Adjust the products display in 4 columns */
        #featured-products .row {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 products per row */
            gap: 20px; /* Space between products */
        }
        
        /* Adjust card style */
        #featured-products .card {
            border: none;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        #featured-products .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        /* Card image */
        #featured-products .card img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Card Title and Price Styling */
        #featured-products .card-body {
            padding: 15px;
        }
        
        #featured-products .card-title {
            font-size: 1rem;
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        #featured-products p {
            font-size: 0.9rem;
        }

        #featured-products .card-body strong {
            font-size: 1rem;
        }

        /* Adjust container size for better responsiveness */
        .container {
            max-width: 1200px;
        }

        /* Intro and Services Sections */
        #intro, #services { 
            background-color: #f8f9fa; 
            padding: 50px 15px; 
            border-radius: 10px; 
        }
        
        /* Services Section */
        #services .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            background-color: #ffffff;
        }
        #services .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        #services .card img {
            max-width: 80px;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
    <!-- New Banner Section -->
    <div id="banner">
        <div class="content">
            <h1>Chào mừng đến với cửa hàng của chúng tôi</h1>
            <p>Phụ kiện điện tử chất lượng cao cho mọi nhu cầu. Ưu đãi đặc biệt và giao hàng nhanh chóng trên toàn quốc!</p>
        </div>
    </div>

    <!-- Intro Section -->
    <section id="intro">
        <div class="container text-center">
            <img src="/public/assets/client/images/thu-chao-mung-nhan-vien-moi-1.jpg" alt="Cửa hàng" class="img-fluid mb-4">
            <h2 class="mb-4">Chào mừng đến với cửa hàng phụ kiện điện tử của chúng tôi!</h2>
            <p class="lead">Chúng tôi cung cấp đa dạng các loại phụ kiện điện tử chất lượng cao, từ cáp sạc, tai nghe đến pin dự phòng và nhiều sản phẩm khác.</p>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="featured-products" class="py-5">
        <div class="container"> 
            <h2 class="text-center mb-5">SẢN PHẨM NỔI BẬT</h2>
            <div class="row">
                <?php if (!empty($featuredProducts)) : ?>

                    <?php foreach ($featuredProducts as $item) : ?>
                        <div class="col">
                            <a href="/products/<?= $item['id'] ?>" class="card-link">
                                <div class="card h-100">
                                    <div class="position-relative">
                                        <?php if ($item['discount_price'] > 0) : ?>
                                            <span class="badge bg-danger position-absolute top-1 start-0 m-0">Sale</span>
                                        <?php endif; ?>
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

                <?php else : ?>
                    <h3 class="text-center text-danger">Không có sản phẩm nổi bật</h3>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Dịch vụ của chúng tôi</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card p-4 mb-4 shadow-sm">
                        <img src="/public/assets/client/images/f2.png" alt="Giao hàng nhanh" class="img-fluid">
                        <h3 class="mt-3">Giao hàng nhanh</h3>
                        <p>Giao hàng toàn quốc chỉ trong 1-2 ngày làm việc.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 mb-4 shadow-sm">
                        <img src="/public/assets/client/images/f6.png" alt="Tư vấn tận tình" class="img-fluid">
                        <h3 class="mt-3">Tư vấn tận tình</h3>
                        <p>Đội ngũ tư vấn viên luôn sẵn sàng hỗ trợ khách hàng.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 mb-4 shadow-sm">
                        <img src="/public/assets/client/images/f3.png" alt="Đổi trả miễn phí" class="img-fluid">
                        <h3 class="mt-3">Đổi trả miễn phí</h3>
                        <p>Chính sách đổi trả dễ dàng trong 7 ngày.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="featured-products" class="py-5">
    <div class="container"> 
        <h2 class="text-center mb-5">SẢN PHẨM NỔI BẤT</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php if (!empty($data['products'])) : ?>
                <?php foreach ($data['products'] as $product) : ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="position-relative">
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">Hot</span>
                                <img 
                                    src="<?= APP_URL ?>/public/uploads/products/<?= $product['image'] ?>" 
                                    class="card-img-top" 
                                    alt="<?= $product['name'] ?>" 
                                    style="height: 200px; object-fit: cover;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $product['name'] ?></h5>
                                <?php if ($product['discount_price'] > 0) : ?>
                                    <p class="text-muted"><strike><?= number_format($product['price']) ?> đ</strike></p>
                                    <p class="text-danger"><strong><?= number_format($product['price'] - $product['discount_price']) ?> đ</strong></p>
                                <?php else : ?>
                                    <p class="text-primary"><strong><?= number_format($product['price']) ?> đ</strong></p>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-center gap-2">
                                <a href="/products/<?= $product['id'] ?>" class="btn btn-sm btn-primary">Chi tiết</a>
                                <form action="/cart/add" method="post" class="d-inline-block">
                                    <input type="hidden" name="method" value="POST">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-success">Thêm vào giỏ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-muted">Không có sản phẩm nổi bật.</p>
            <?php endif; ?>
        </div>
    </div>
</section>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
<?php
    }
}
?>
