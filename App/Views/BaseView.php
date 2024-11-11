<?php

namespace App\Views;

abstract class BaseView{

    /**
     * Phương thức này dùng để in ra giao diện
    */
    abstract public static function render($data=null);

}