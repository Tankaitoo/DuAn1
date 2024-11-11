<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class ResetPassword extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 90vh; margin-bottom: 50px;">
            <div class="card p-5" style="width: 400px;">
                <div >
                    <h1 class="text-center mb-4">Đặt lại mật khẩu</h1>
                    <form action="/reset-password" method="post">
                        <input type="hidden" name="method" id="" value="PUT">
                        <div class="form-group">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="re_password">Nhập lại mật khẩu:</label>
                            <input type="password" name="re_password" class="form-control" id="re_password">
                        </div>
                        <div class="text-center">
                            <button type="reset" class="btn btn-secondary mr-2">Nhập lại</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
