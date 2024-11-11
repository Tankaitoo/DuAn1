<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ForgotPassword extends BaseView
{
  public static function render($data = null)
  {
?>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height:70vh;">
      <div class="card p-5">
        <div >
          <h1 class="text-center mb-4">Lấy lại mật khẩu</h1>
          <form action="/forgot-password" method="post">
            <input type="hidden" name="method" value="POST" id="">
            <div class="form-group">
              <label for="username">Tên đăng nhập:</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="text-center">
              <button type="reset" class="btn btn-secondary mr-2">Nhập lại</button>
              <button type="submit" name="submit" id="submit" class="btn btn-primary">Lấy lại mật khẩu</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<?php
  }
}
