<?php
namespace App\Views\Client\Checkout;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $cart = $data['cart'] ?? [];
        $total = $data['total'] ?? 0;
        ?>
        <style>
            /* General reset and body style */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f7fa;
                color: #333;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
                max-width: 1200px;
                margin: 40px auto;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                padding: 30px;
            }

            .breadcrumb {
                background-color: transparent;
                margin-bottom: 20px;
                font-size: 1rem;
                color: #007bff;
            }

            .breadcrumb a {
                text-decoration: none;
                color: #007bff;
            }

            .breadcrumb a:hover {
                text-decoration: underline;
            }

            .breadcrumb-item.active {
                color: #6c757d;
            }

            h3 {
                font-size: 1.6rem;
                color: #343a40;
                margin-bottom: 20px;
                font-weight: bold;
            }

            /* Table styling */
            .table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 30px;
                font-size: 1rem;
            }

            .table th,
            .table td {
                padding: 12px;
                text-align: center;
                border-bottom: 1px solid #dee2e6;
            }

            .table th {
                background-color: #007bff;
                color: #fff;
            }

            .table tbody tr:nth-child(odd) {
                background-color: #f8f9fa;
            }

            .table tbody tr:hover {
                background-color: #f1f1f1;
            }

            .table tfoot td {
                font-weight: bold;
            }

            .form-label {
                font-size: 0.9rem;
                color: #495057;
                font-weight: bold;

            }

            .form-control {
                font-size: 1.1rem;
                /* Tăng kích thước font trong ô nhập liệu */
                padding: 1px;
                /* Tăng padding để ô nhập liệu rộng hơn */
                height: 45px;
                /* Tăng chiều cao của ô nhập liệu */
                border-radius: 5px;
                border: 1px solid #ced4da;
                width: 100%;
            }

            .form-control:focus {
                outline: none;
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            select.form-control {
                background-color: #fff;
                height: 40px;
                border-radius: 5px;
            }

            /* Button styles */
            .btn {
                display: inline-block;
                padding: 12px 20px;
                font-size: 1.1rem;
                font-weight: bold;
                color: #fff;
                background-color: #28a745;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-align: center;
                transition: background-color 0.3s;
            }

            .btn:hover {
                background-color: #218838;
            }

            .btn-secondary {
                background-color: #6c757d;
            }

            .btn-secondary:hover {
                background-color: #5a6268;
            }

            /* Toggle payment options */
            #momo-info,
            #bank-info {
                display: none;
                margin-bottom: 10px;
            }

            .payment-info {
                margin-top: 2px;
                font-size: 1.5rem;
                color: #333;
            }

            /* Success message */
            #success-message {
                margin-top: 20px;
                font-size: 1.2rem;
                color: green;
                font-weight: bold;
            }

            /* Mobile responsiveness */
            @media (max-width: 768px) {
                .container {
                    margin: 10px;
                    padding: 20px;
                }

                h3 {
                    font-size: 1.4rem;
                }

                .table th,
                .table td {
                    padding: 10px;
                    font-size: 0.9rem;
                }

                .form-control {
                    font-size: 0.9rem;
                    padding: 10px;
                }

                .btn {
                    font-size: 1rem;
                    padding: 10px 15px;
                }
            }
        </style>

        <div class="container">
            <div class="row">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/cart">Giỏ hàng</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                    </ol>
                </nav>
            </div>

            <h3>Thông tin thanh toán</h3>
            <table class="table">
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
                    <?php
                    $total = 0;
                    foreach ($cart as $key => $item) {
                        $price = isset($item['price']) ? (float) $item['price'] : 0;
                        $quantity = isset($item['quantity']) ? (int) $item['quantity'] : 0;
                        $subtotal = $price * $quantity;
                        $total += $subtotal;
                        ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item['name'] ?? 'Không tên' ?></td>
                            <td><?= $quantity ?></td>
                            <td><?= number_format($price) ?> VND</td>
                            <td><?= number_format($subtotal) ?> VND</td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td><strong><?= number_format($total) ?> VND</strong></td>
                    </tr>
                </tbody>
            </table>

            <!-- Form xử lý thanh toán -->
            <form id="checkout-form" action="/checkout_vup" method="GET">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                    <input type="hidden" name="total" value="<?= $total ?>">
                </div>

                <div class="mb-5">
                    <label for="payment_method" class="form-label">Phương thức thanh toán</label><br><br>
                    <select class="form-control" id="payment_method" name="payment_method" required>
                        <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                        <option value="momo">Thanh toán bằng MoMo</option>
                        <option value="bank">Thanh toán qua ngân hàng</option>
                    </select>
                </div>

                <div id="momo-info" class="payment-info">
                    <p><strong>Thông tin MoMo:</strong></p>
                    <p>Số tài khoản MOMO: 0978991127</p>
                </div>

                <div id="bank-info" class="payment-info">
                    <p><strong>Thông tin ngân hàng:</strong></p>
                    <p>Ngân hàng: MB Bank</p>
                    <p>Số tài khoản: 0978991127</p>
                </div><br><br>

                <button type="submit" class="btn btn-success">Thanh toán</button><br>
            </form>

            <!-- Thông báo sau khi đặt hàng thành công -->
            <div id="success-message" style="display:none;">
                <p>Đặt hàng thành công! Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi.</p>
            </div>
        </div>

        <script>


            // Toggle thông tin thanh toán theo phương thức chọn
            document.getElementById('payment_method').addEventListener('change', function () {
                var momoInfo = document.getElementById('momo-info');
                var bankInfo = document.getElementById('bank-info');
                var paymentMethod = this.value;

                if (paymentMethod === 'momo') {
                    momoInfo.style.display = 'block';
                    bankInfo.style.display = 'none';
                } else if (paymentMethod === 'bank') {
                    bankInfo.style.display = 'block';
                    momoInfo.style.display = 'none';
                } else {
                    momoInfo.style.display = 'none';
                    bankInfo.style.display = 'none';
                }
            });
        </script>
        <?php
    }
}
?>