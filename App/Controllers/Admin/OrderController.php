<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Validations\AuthValidation;
use App\Validations\CategoryValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Order\View;
use App\Views\Admin\Pages\Order\Index;
use GrahamCampbell\ResultType\Success;

class OrderController
{


    // hiển thị danh sách
    public static function index()
    {
        $orderModel = new Order();
        $orders = $orderModel->getAllOrder();
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($orders);
        Footer::render();
    }

    public function view($id)
    {
        $orderDetailModel = new OrderDetail();
        $order = $orderDetailModel->getOrderDetailById($id);
        // dd($order);
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        View::render($order);
        Footer::render();
    }

}
