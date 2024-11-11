<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa loại sản phẩm</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/users/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa người dùng</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div align="center">
                                        <img src="<?= APP_URL?>/public/uploads/users/<?= $data['avatar']?>" width="300px">
                                    </div>
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id"  name="id" value="<?= $data['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Tên đăng nhập*</label>
                                        <input type="text" class="form-control" id="username"  name="username" value="<?= $data['username'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input type="email" class="form-control" id="email"  name="email" value="<?= $data['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Họ và tên*</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu*</label>
                                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu người dùng..." name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="re_password">Nhập lại mật khẩu*</label>
                                        <input type="password" class="form-control" id="re_password" placeholder="Nhập lại mật khẩu người dùng..." name="re_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Hình ảnh đại diện*</label>
                                        <input type="file" class="form-control" id="avatar" placeholder="Chọn ảnh đại diện..." name="avatar">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Quyền*</label>
                                        <input type="text" class="form-control" id="role" value="<?=($data['role'] == 1) ? 'Quản trị viên' : 'Khách hàng'?>" name="role" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="status" name="status">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

    <?php
    }
}
