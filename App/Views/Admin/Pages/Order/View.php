<?php
namespace App\Views\Admin\Pages\Order;

use App\Views\BaseView;

class View extends BaseView
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
                        <h4 class="page-title">CHI TIẾT ĐƠN HÀNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
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
                                                <th>Hình ảnh</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá tiền</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($data as $order):
                                                $total += $order['price'] * $order['qty'];
                                                ?>

                                                <tr>
                                                    <td><?= $order['id'] ?></td>
                                                    <td>
                                                        <img width="50"
                                                            src="/public/uploads/products/<?= $order['product_image'] ?>" alt="">
                                                    </td>
                                                    <td><?= $order['product_name'] ?></td>
                                                    <td><?= $order['qty'] ?></td>
                                                    <td><?= number_format($order['price']) ?> VND</td>
                                                    <td><?= number_format($order['price'] * $order['qty']) ?> VND</td>
                                                </tr>
                                                
                                            <?php endforeach; ?>
                                            <tr>
                                                    <td colspan="1000">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <strong>Tổng đơn hàng: </strong>
                                                                <?= number_format($total) ?> VND
                                                            </div>
                                                            <a class="btn btn-danger" href="/admin/orders/index">Quay về</a>
                                                        </div>
                                                    </td>
                                                </tr>
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