<?php

namespace App\Helpers;

class NotificationHelper{
    public static function success($key, $message){
        $_SESSION['success'][$key] = $message;
    }

    public static function error($key, $message){
        $_SESSION['error'][$key] = $message;
    }

    public static function unset(){
        unset($_SESSION['success']);
        unset($_SESSION['error']);
    }
}