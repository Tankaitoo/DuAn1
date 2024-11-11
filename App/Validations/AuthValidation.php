<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class AuthValidation{
    public static function register(): bool {
        $is_valid = true;

        if (!isset($_POST['username']) || $_POST['username'] === ''){
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        if (!isset($_POST['password']) || $_POST['password'] === ''){
            NotificationHelper::error('password', 'Không để trống mật khẩu');
            $is_valid = false;
        }
        else{
            if(strlen($_POST['password']) < 3){
                NotificationHelper::error('password', 'Mật khẩu nhập từ 3 ký tự');
                $is_valid = false;
            }
        }

        if (!isset($_POST['re_password']) || $_POST['re_password'] === ''){
            NotificationHelper::error('re_password', 'Không để trống nhập lại mật khẩu');
            $is_valid = false;
        }
        else{
            if($_POST['password'] != $_POST['re_password']){
                NotificationHelper::error('re_password','Trường mật khẩu và nhập lại mật khẩu không giống nhau');
                $is_valid = false;
            }
        }

        if(!isset($_POST['email']) || $_POST['email'] === ''){
            NotificationHelper::error('email', 'Không để trống email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if(!preg_match($emailPattern, $_POST['email'])){
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        if (!isset($_POST['name']) || $_POST['name'] === ''){
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }
        
        
        return $is_valid;
    }

    public static function login(): bool {
        $is_valid = true;

        if (!isset($_POST['username']) || $_POST['username'] === ''){
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        if (!isset($_POST['password']) || $_POST['password'] === ''){
            NotificationHelper::error('password', 'Không để trống mật khẩu');
            $is_valid = false;
        }
        return $is_valid;
    }

    public static function edit(): bool {
        $is_valid = true;

        if(!isset($_POST['email']) || $_POST['email'] === ''){
            NotificationHelper::error('email', 'Không để trống email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if(!preg_match($emailPattern, $_POST['email'])){
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }

        if (!isset($_POST['name']) || $_POST['name'] === ''){
            NotificationHelper::error('name', 'Không để trống họ và tên');
            $is_valid = false;
        }
        return $is_valid;
    }

    public static function uploadAvatar(){
        if(!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])){
            return false;
        }

        //nơi lưu trữ hình ảnh trong sourcecode
        $target_dir = 'public/uploads/users/';

        //kiểm tra file ảnh
        $imageFileType = strtolower(pathinfo(basename($_FILES['avatar']['name']), PATHINFO_EXTENSION));

        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF');
            return false;
        }

        //thay đổi tên file thành dạng năm tháng ngày giờ phút giây
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        //đường dẫn đầy đủ để di chuyển file
        $target_file = $target_dir.$nameImage;

        if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)){
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu trữ');
            return false;
        }

        return $nameImage;
    }

    public static function changePassword(): bool {
        $is_valid = true;
        //Mật khẩu cũ
        if (!isset($_POST['old_password']) || $_POST['old_password'] === ''){
            NotificationHelper::error('password', 'Không để trống mật khẩu cũ');
            $is_valid = false;
        }

        if (!isset($_POST['new_password']) || $_POST['new_password'] === ''){
            NotificationHelper::error('new_password', 'Không để trống mật khẩu mới');
            $is_valid = false;
        }
        else if(strlen($_POST['new_password']) < 3){
                NotificationHelper::error('new_password', 'Mật khẩu mới nhập từ 3 ký tự');
                $is_valid = false;
            }
            
        if (!isset($_POST['re_password']) || $_POST['re_password'] === ''){
            NotificationHelper::error('re_password', 'Không để trống nhập lại mật khẩu mới');
            $is_valid = false;
        }
        else if($_POST['new_password'] != $_POST['re_password']){
                NotificationHelper::error('re_password','Trường mật khẩu mới và nhập lại mật khẩu mới không giống nhau');
                $is_valid = false;
            }
        
            
        return $is_valid;
    }

    public static function forgotPassword(): bool {
        $is_valid = true;

        if (!isset($_POST['username']) || $_POST['username'] === ''){
            NotificationHelper::error('username', 'Không để trống tên đăng nhập');
            $is_valid = false;
        }

        if(!isset($_POST['email']) || $_POST['email'] === ''){
            NotificationHelper::error('email', 'Không để trống email');
            $is_valid = false;
        } else {
            $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
            if(!preg_match($emailPattern, $_POST['email'])){
                NotificationHelper::error('email', 'Email không đúng định dạng');
                $is_valid = false;
            }
        }
        
        return $is_valid;
    }

    public static function resetPassword(): bool {
        $is_valid = true;

        if (!isset($_POST['password']) || $_POST['password'] === ''){
            NotificationHelper::error('password', 'Không để trống mật khẩu');
            $is_valid = false;
        }
        else{
            if(strlen($_POST['password']) < 3){
                NotificationHelper::error('password', 'Mật khẩu nhập từ 3 ký tự');
                $is_valid = false;
            }
        }

        if (!isset($_POST['re_password']) || $_POST['re_password'] === ''){
            NotificationHelper::error('re_password', 'Không để trống nhập lại mật khẩu');
            $is_valid = false;
        }
        else{
            if($_POST['password'] != $_POST['re_password']){
                NotificationHelper::error('re_password','Trường mật khẩu và nhập lại mật khẩu không giống nhau');
                $is_valid = false;
            }
        }
        
        return $is_valid;
    }
        
}
?>