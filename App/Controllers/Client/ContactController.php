<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Contact;
use App\Views\Client\Layouts\Header;


class ContactController
{
    // hiển thị danh sách
    public static function index()
    {
        Header::render();  
        Notification::render();
        NotificationHelper::unset();
        Contact::render();
        Footer::render();
    }
}
