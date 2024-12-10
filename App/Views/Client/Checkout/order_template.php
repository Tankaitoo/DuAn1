<?php
// File template để lưu đơn hàng (order_template.php)
$order_details = isset($order_details) ? $order_details : [];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng #<?= $order_details['order_id'] ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .order-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: #28a745;
        }
        .order-details {
            margin-top: 20px;
        }
        .order-details th, .order-details td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .order-details th {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="order-container">
        <h2>Đơn hàng của bạn</h2>
        <p><strong>Mã đơn hàng:</strong> <?= $order_details['order_id'] ?></p>
        <p><strong>Họ và tên:</strong> <?= $order_details['name'] ?></p>
        <p><strong>Địa chỉ:</strong> <?= $order_details['address'] ?></p>
        <p><strong>Số điện thoại:</strong> <?= $order_details['phone'] ?></p>
        <p><strong>Phương thức thanh toán:</strong> <?= $order_details['payment_method'] ?></p>
        <table class="order-details">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_details['cart'] as $key => $item): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= number_format($item['price']) ?> VND</td>
                        <td><?= number_format($item['price'] * $item['quantity']) ?> VND</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><strong>Tổng cộng:</strong> <?= number_format($order_details['total']) ?> VND</p>
    </div>
</body>
</html>
