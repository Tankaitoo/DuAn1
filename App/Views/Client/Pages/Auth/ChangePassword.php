<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ChangePassword extends BaseView
{
  public static function render($data = null)
  {
?>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 110vh; margin-bottom: 80px;">
      <div class="offset-md-1 col-nd-1" style="margin-right: 20px;">
        <?php
        if ($data && $data['avatar']) :
        ?>
          <img src="<?= APP_URL ?>/public/uploads/users/<?= $data['avatar'] ?>" alt="" width="100%">
        <?php
        else :
        ?>
          <img src="<?= APP_URL ?>/public/uploads/users/userimg.jpg" alt="" width="20%">
        <?php
        endif;
        ?>
      </div>
      <div class="card p-5">
        <div >
          <h1 class="text-center mb-4">Đổi mật khẩu</h1>
          <form action="/change-password" method="post">
            <input type="hidden" name="method" value="PUT" id="">
            <div class="form-group">
              <label for="username">Tên đăng nhập:</label>
              <input type="text" name="username" class="form-control" id="username" value="<?= $data['username'] ?>" disabled>
            </div>
            <div class="form-group">
              <label for="old_password">Mật khẩu cũ:</label>
              <input type="password" name="old_password" class="form-control" id="old_password">
            </div>
            <div class="form-group">
              <label for="new_password">Mật khẩu mới:</label>
              <input type="password" name="new_password" class="form-control" id="new_password">
            </div>
            <div class="form-group">
              <label for="re_password">Nhập lại mật khẩu mới:</label>
              <input type="password" name="re_password" class="form-control" id="re_password">
            </div>
            <div class="text-center">
              <button type="reset" class="btn btn-secondary mr-2">Nhập lại</button>
              <button type="submit" name="submit" id="submit" class="btn btn-primary">Đăng ký</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<?php
  }
}
