<?php
define('APP_URL', getenv('APP_URL'));
define("DB_HOST", getenv('DB_HOST'));
define('DB_USERNAME', getenv('DB_USERNAME'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_NAME', getenv('DB_NAME'));

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}
// set timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');
