<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">
        </head>

        <body>


            <nav class="navbar navbar-expand-lg navbar-light text-dark" style="background-color: #e3f2fd;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <img src="/public/assets/client/images/logo.png" alt="" width="10%">
                        <li class="nav-item active">
                            <a class="nav-link text-body" href="/">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="/products">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#">Giỏ hàng</a>
                        </li>
                    </ul>
                   
                   
                    <ul class="navbar-nav ml-auto">
                        <?php
                        if ($is_login) :
                        ?>
                            <li class="nav-item dropdown">
                                <a class="btn btn-danger dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['users']['username'] ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/users/<?= $_SESSION['users']['id']?>">Thông tin tài khoản</a>
                                    <a class="dropdown-item" href="/change-password">Đổi mật khẩu</a>
                                    <a class="dropdown-item" href="/logout">Đăng xuất</a>
                                </div>
                            </li>
                        <?php
                        else :
                        ?>
                            <li class="nav-item">
                                <a class="nav-link text-body" href="/login">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-body" href="/register">Đăng ký</a>
                            </li>
                        <?php
                        endif;
                        ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>

            <div>
                
            </div>

    <?php

    }
}

    ?>