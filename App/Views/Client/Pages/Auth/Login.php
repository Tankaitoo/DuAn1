<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Login extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 90vh; margin-bottom: 50px;">
            <div class="card p-5" style="width: 400px;">
                <div >
                    <h1 class="text-center mb-4">Đăng nhập</h1>
                    <form action="/login" method="post">
                        <input type="hidden" name="method" id="" value="POST">
                        <div class="form-group">
                            <label for="username">Tên đăng nhập:</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="">
                                <input type="checkbox" class="form-check-input" name="remember" id="" checked>
                                Ghi nhớ đăng nhập
                            </label>
                            
                        </div><br>

                        <div class="text-center">
                            <button type="reset" class="btn btn-secondary mr-2">Nhập lại</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Đăng nhập</button>
                        </div><br>
                        <a href="/register" class="text-danger">Đăng ký</a><br><br>
                        <a href="/forgot-password" class="text-danger">Quên mật khẩu?</a>
                        
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
