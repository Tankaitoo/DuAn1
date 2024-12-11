<?php
namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ ĐƠN HÀNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách đơn hàng</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
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
                                            <?php foreach ($data as $order): ?>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}