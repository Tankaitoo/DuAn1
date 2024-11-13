<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>
<head>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

    <style>

        #bannerSlider { max-height: 100%; overflow: hidden; }
        #bannerSlider .carousel-item img { object-fit: cover; height: 100%; width: 100%; }
        #intro img, #services img { max-width: 100px; }
        #intro, #services { background-color: #f8f9fa; border-radius: 8px; }
        .card { transition: transform 0.2s ease; }
        .card:hover { transform: translateY(-10px); }
    </style>
<body>

    <div id="bannerSlider" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="/public/assets/client/images/banner1.jpg" alt="Banner Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Chào mừng đến với cửa hàng của chúng tôi</h5>
                    <p>Phụ kiện điện tử chất lượng cao cho mọi nhu cầu.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="/public/assets/client/images/banner2.jpg" alt="Banner Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ưu đãi đặc biệt</h5>
                    <p>Khuyến mãi lên đến 50% cho một số sản phẩm.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="/public/assets/client/images/banner3.jpg" alt="Banner Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Giao hàng nhanh chóng</h5>
                    <p>Nhận hàng trong vòng 1-2 ngày trên toàn quốc.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Intro Section -->
    <section id="intro" class="py-5">
        <div class="container text-center">
            <img src="/public/assets/client/images/thu-chao-mung-nhan-vien-moi-1.jpg" alt="Cửa hàng" class="img-fluid mb-4" style="max-width: 400px;">
            <h2>Chào mừng đến với cửa hàng phụ kiện điện tử của chúng tôi!</h2>
            <p>Chúng tôi cung cấp đa dạng các loại phụ kiện điện tử chất lượng cao, từ cáp sạc, tai nghe đến pin dự phòng và nhiều sản phẩm khác.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Dịch vụ của chúng tôi</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="/public/assets/client/images/f2.png" alt="Giao hàng nhanh" class="img-fluid mb-3">
                    <h3>Giao hàng nhanh</h3>
                    <p>Giao hàng toàn quốc chỉ trong 1-2 ngày làm việc.</p>
                </div>
                <div class="col-md-4">
                    <img src="/public/assets/client/images/f6.png" alt="Tư vấn tận tình" class="img-fluid mb-3">
                    <h3>Tư vấn tận tình</h3>
                    <p>Đội ngũ tư vấn viên luôn sẵn sàng hỗ trợ khách hàng.</p>
                </div>
                <div class="col-md-4">
                    <img src="/public/assets/client/images/f3.png" alt="Đổi trả miễn phí" class="img-fluid mb-3">
                    <h3>Đổi trả miễn phí</h3>
                    <p>Chính sách đổi trả dễ dàng trong 7 ngày.</p>
                </div>
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
