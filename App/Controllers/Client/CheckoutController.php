<?php

namespace App\Controllers\Client;

use App\Views\Client\Checkout\Index as CheckoutView;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $orderModel = new Order();
        $orderDetailModel = new OrderDetail();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Lấy thông tin thanh toán
            $name = $_GET['name'] ?? '';
            $address = $_GET['address'] ?? '';
            $phone = $_GET['phone'] ?? '';
            $payment_method = $_GET['payment_method'] ?? '';
            $total = $_GET['total'] ?? '';
            // Kiểm tra thông tin thanh toán
            if ($name && $address && $phone && $payment_method) {
                // lưu đơn hàng vào cơ sở dữ liệu
                // get cookie
                $id_user = json_decode($_COOKIE['users'])->id;
                $order_id = $orderModel->createOrder([
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'payment_method' => $payment_method,
                    'total' => $total,
                    'user_id' => $id_user
                ]);
                
                // tạo chi tiết đơn hàng
                // dd($_SESSION['cart']);
                foreach ($_SESSION['cart'] as $product) {
                    $orderDetailModel->create([
                        'order_id' => $order_id,
                        'product_id' => $product['product_id'],
                        'qty' => $product['quantity'],
                        'price' => $product['price']
                    ]);
                }
                // xóa giỏ hàng
                unset($_SESSION['cart']);
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
