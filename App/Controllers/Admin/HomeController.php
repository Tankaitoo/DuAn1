<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Home;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;

class HomeController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();
        Home::render();
        Footer::render();
    }
}
