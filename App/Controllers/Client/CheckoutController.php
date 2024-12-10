<?php

namespace App\Controllers\Client;

use App\Views\Client\Checkout\Index as CheckoutView;

class CheckoutController
{
    // Hiển thị trang thanh toán
    public function index()
    {
        $cart = $_SESSION['cart'] ?? [];
        $total = $_SESSION['total'] ?? 0;

        // Render view thanh toán
        CheckoutView::render([
            'cart' => $cart,
            'total' => $total
        ]);
    }

    // Xử lý khi người dùng gửi thông tin thanh toán
    public function processCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin thanh toán
            $name = $_POST['name'] ?? '';
            $address = $_POST['address'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $payment_method = $_POST['payment_method'] ?? '';

            // Kiểm tra thông tin thanh toán
            if ($name && $address && $phone && $payment_method) {
                // Giả sử bạn đã lưu đơn hàng vào cơ sở dữ liệu hoặc xử lý thanh toán

                // Thông báo đặt hàng thành công
                $_SESSION['order_success'] = true;

                // Sau khi đặt hàng thành công, chuyển hướng người dùng đến trang thành công
                header('Location: /order-success');
                exit;
            } else {
                // Nếu thiếu thông tin, hiển thị thông báo lỗi
                $_SESSION['order_error'] = 'Vui lòng điền đầy đủ thông tin thanh toán!';
                header('Location: /checkout');
                exit;
            }
        }
    }
}
