<?php

namespace App\Views\Client;

use App\Views\BaseView;

class Contact extends BaseView
{
    public static function render($data = null)
    {
?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .contact-section {
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control, .btn-primary {
            border-radius: 5px;
        }
         .map-container {
            height: 100%;
            border-radius: 8px;
            overflow: hidden;
        }
        .contact-form, .map-container {
            min-height: 400px;
        }
    </style>
</head>
<body>

 

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 contact-form">
                <section class="contact-section">
                    <h2 class="text-center text-primary mb-4">Thông tin liên hệ</h2>
                    <p>Quý khách có thể liên hệ với chúng tôi qua mẫu dưới đây. Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất.</p>

                    <form action="submit_contact.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên của bạn</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Lời nhắn</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Gửi liên hệ</button>
                    </form>
                </section>
            </div>
            <div class="col-md-6">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d74759.2528757174!2d105.7364404515907!3d10.012792073100975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2sFPT%20Polytechnic%20College!5e0!3m2!1sen!2s!4v1730988469313!5m2!1sen!2s" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>



</body>
</html>
<?php

?>
<?php
    }
}
?>