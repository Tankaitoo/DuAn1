<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
  public static function render($data = null)
  {
?>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 110vh; margin-bottom: 80px;">
      <div class="card p-5">
        <div >
          <h1 class="text-center mb-4">Đăng ký</h1>
          <form action="/register" method="post">
            <input type="hidden" name="method" value="POST" id="">
            <div class="form-group">
              <label for="username">Tên đăng nhập:</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu:</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
              <label for="re_password">Nhập lại mật khẩu:</label>
              <input type="password" name="re_password" class="form-control" id="re_password">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="name">Họ và tên:</label>
              <input type="name" name="name" class="form-control" id="name">
            </div>
            <div class="text-center">
              <button type="reset" class="btn btn-secondary mr-2">Nhập lại</button>
              <button type="submit" name="submit" id="submit" class="btn btn-primary">Đăng ký</button>
            </div>
            <a href="/login" class="text-danger" style="float: left;">Đăng nhập!</a>
          </form>
        </div>
      </div>
    </div>
<?php
  }
}
