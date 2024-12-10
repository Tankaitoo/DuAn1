<!-- Đây là trang quản trị hiển thị các đơn hàng -->
<div class="container">
    <h3>Danh sách đơn hàng</h3>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Thành tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['name'] ?></td>
                    <td><?= $order['address'] ?></td>
                    <td><?= $order['phone'] ?></td>
                    <td><?= number_format($order['total']) ?> VND</td>
                    <td><?= $order['payment_method'] ?></td>
                    <td><a href="/admin/orders/view/<?= $order['id'] ?>">Xem chi tiết</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
