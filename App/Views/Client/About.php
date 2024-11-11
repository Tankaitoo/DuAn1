<?php

namespace App\Views\Client;

use App\Views\BaseView;

class About extends BaseView
{
    public static function render($data = null)
    {
?>
<style>
                body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .about-section {
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .about-section h2 {
            color: #007bff;
            margin-bottom: 1rem;
        }
        .about-section img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        .list-group-item {
            border: none;
        }
        footer {
            color:black;
            padding: 1rem 0;
        }
        

    </style>
</head>
<body>


<div class="container my-5">
    <section id="about" class="about-section text-center">
        <h2>Chúng tôi là ai?</h2>
        <!-- Cập nhật đường dẫn hình ảnh để phù hợp với cấu trúc thư mục -->
        <img src="/public/assets/client/images/logo.png" alt="Store Image" class="img-fluid mb-3">
        <p>Chúng tôi là một cửa hàng chuyên cung cấp các sản phẩm phụ kiện công nghệ như tai nghe, cáp sạc, sạc dự phòng, ốp lưng điện thoại và nhiều sản phẩm tiện ích khác.</p>
    </section>

    <section id="mission" class="about-section text-center">
        <h2>Sứ mệnh của chúng tôi</h2>
        <!-- Cập nhật đường dẫn hình ảnh để phù hợp với cấu trúc thư mục -->
        <img src="/public/assets/client/images/sm.jpg" alt="Mission Image" class="img-fluid mb-3">
        <p>Sứ mệnh của chúng tôi là cung cấp những sản phẩm phụ kiện chất lượng cao với giá thành hợp lý, giúp khách hàng trải nghiệm công nghệ tốt nhất.</p>
    </section>

    <section id="why-us" class="about-section text-center">
        <h2>Tại sao chọn chúng tôi?</h2>
        <!-- Cập nhật đường dẫn hình ảnh để phù hợp với cấu trúc thư mục -->
        <img src="/public/assets/client/images/team.jpg" alt="Team Image" class="img-fluid mb-3">
        <ul class="list-group text-start">
            <li class="list-group-item"><strong>Sản phẩm chất lượng:</strong> Chúng tôi cam kết cung cấp các sản phẩm có nguồn gốc rõ ràng và chất lượng đảm bảo.</li>
            <li class="list-group-item"><strong>Giao hàng nhanh:</strong> Đảm bảo giao hàng nhanh chóng và tiện lợi.</li>
            <li class="list-group-item"><strong>Hỗ trợ khách hàng:</strong> Đội ngũ tư vấn nhiệt tình, luôn sẵn sàng giải đáp mọi thắc mắc của bạn.</li>
            <li class="list-group-item"><strong>Chính sách đổi trả:</strong> Chúng tôi cung cấp dịch vụ đổi trả trong vòng 30 ngày với các sản phẩm bị lỗi.</li>
        </ul>
    </section>
</div>

<?php

?>
<?php
    }
}
?>