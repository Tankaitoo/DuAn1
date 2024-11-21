<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {
?>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS for better styling -->
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
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        #banner p {
            font-size: 1.5rem;
        }

        /* Other Sections */
        #intro, #services { background-color: #f8f9fa; padding: 50px 0; border-radius: 10px; }
        #intro img { max-width: 350px; border-radius: 10px; }
        #services .card { transition: transform 0.3s ease, box-shadow 0.3s ease; border: none; background-color: #ffffff; }
        #services .card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); }
        #services .card img { max-width: 80px; margin-bottom: 15px; }
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

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
<?php
    }
}
?>
