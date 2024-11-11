<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
  public static function render($data = null)
  {
?>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 110vh; margin-bottom: 70px;">
      <div class="offset-md-1 col-nd-1" style="margin-right: 20px;">
        <?php
        if ($data && $data['avatar']) :
        ?>
          <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="" width="100%">
        <?php
        else :
        ?>
          <img src="<?= APP_URL ?>/public/uploads/users/userimg.jpg" alt="" width="100%">
        <?php
        endif;
        ?>
      </div>
      <div class="card p-5 d-flex flex-row">
        <div >
          <h1 class="text-center mb-4">Thông tin tài khoản</h1>
          <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="method" value="PUT" id="">
            <div class="form-group">
              <label for="username">Tên đăng nhập:</label>
              <input type="text" name="username" class="form-control" id="username" value="<?= $data['username'] ?>" disabled>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control" id="email" value="<?= $data['email'] ?>">
            </div>
            <div class="form-group">
              <label for="name">Họ và tên:</label>
              <input type="name" name="name" class="form-control" id="name" value="<?= $data['name'] ?>">
            </div>
            <div class="form-group">
              <label for="avatar">Ảnh đại diện:</label>
              <input type="file" name="avatar" class="form-control" id="avatar">
            </div>
            <div class="text-center">
              <button type="reset" class="btn btn-secondary mr-2">Nhập lại</button>
              <button type="submit" name="submit" id="submit" class="btn btn-primary">Cập nhật</button><br>
              <a href="/change-password"class="text-danger" style="float: left;">Đổi mật khẩu?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
<?php
  }
}
