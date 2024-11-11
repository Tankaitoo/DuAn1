<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Validations\AuthValidation;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Components\Notification;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\ResetPassword;

class AuthController{
    // hiển thị giao diện form register
    public static function register(){
        //hiển thị header
        Header::render();

        //hiển thị thông báo
        Notification::render();
        
        //hủy session thông báo
        NotificationHelper::unset();

        //hiển thị form đăng ký
        Register::render();
        
        //hiển thị footer
        Footer::render();
    }

    public static function login(){
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Login::render();
        Footer::render();
    }

    //thực hiện đăng ký
    public static function registerAction(){
        //bắt lỗi validation

        $is_valid = AuthValidation::register();

        if(!$is_valid){
            NotificationHelper::error('register_valid', 'Đăng ký thất bại');
            var_dump($is_valid);
            header('Location: /register');
            exit();
        }

        //Lấy dử liệu người dùng nhập vào
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $name = $_POST['name'];

        //đưa dữ liệu vào mảng, lưu ý "key" phải trùng với tên trong cơ sở dữ liệu
        $data = [
            'username' => $username,
            'password' => $hash_password,
            'email' => $email,
            'name' => $name
        ];

        $result = AuthHelper::register($data);

        if($result) {
            //var_dump($data);
            header('Location: /login');
        } else {
           // var_dump($data);
            header('Location: /register');
        }
    }

    public static function loginAction(){
        //bắt lỗi
       $is_valid = AuthValidation::login();
       
       if(!$is_valid){
        NotificationHelper::error('login', 'Đăng nhập thất bại');
        header('Location: /login');
        exit;
       }

       $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'remember' => isset($_POST['remember'])
       ];

       $result = AuthHelper::login($data);

       if($result){
        //NotificationHelper::success('login', 'Đăng nhập thành công');
        header('Location: /');
       }else{
        //NotificationHelper::success('login', 'Đăng nhập thất bại');
        header('Location: /login');
       }
    }

    public static function logout(){
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('Location: /');
    }

    public static function edit($id){
        $result = AuthHelper::edit($id);

        if(!$result){
            if(isset($_SESSION['error']['login'])){
                header('Location: /login');
            }
            if(isset($_SESSION['error']['user_id'])){
                $data = $_SESSION['users'];
                $user_id =  $data['id'];
                
                header("Location: /users/edit/$user_id");
                exit;
            }
        }

        $data = $_SESSION['users'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }

    public static function update($id){
        $is_valid = AuthValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update_user', 'Cập nhật thông tin tài khoản thất bại');
            header("Location: /users/$id");
            exit;
        }
        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name']
        ];

        //kiểm tra có upload hình ảnh, nếu có: kiểm tra có hợp lệ ko
        $is_upload = AuthValidation::uploadAvatar();
        if($is_upload){
            $data['avatar'] = $is_upload;
        }

        //gọi helper để update
        $result = AuthHelper::update($id, $data);
        
        //kiểm tra kết quả trả về và chuyển hướng
        if($result){
            header("Location: /users/$id");
        }
    }

    // public static function uploadAvatar(){
    //     if(!isset($_FILES['avatar'])){

    //     };
    // }

    public static function changePassword(){
        $is_login = AuthHelper::checkLogin();

        if(!$is_login){
            NotificationHelper::error('login', 'Vui lòng đăng nhập để đổi mật nhẩu');
            header('location: /login');
            exit;
        }

        $data = $_SESSION['users'];

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ChangePassword::render($data);
        Footer::render();
    }
    //Đổi mật khẩu
    public static function changePasswordAction(){
        $is_valid = AuthValidation::changePassword();

        if(!$is_valid){
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            header('Location: /change-password');
            exit;
        }

        $id = $_SESSION['users']['id'];

        $data = [
            'old_password' => $_POST['old_password'],
            'new_password' => $_POST['new_password']
        ];

        $result = AuthHelper::changePassword($id, $data);

        header('Location: /change-password');
    }

    public static function forgotPassword(){

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();
    }

    public static function forgotPasswordAction(){
        $is_valid = AuthValidation::forgotPassword();

        if(!$is_valid){
            NotificationHelper::error('forgot_password', 'Lấy lại mật khẩu thất bại');
            header('Location: /forgot-password');
            exit;
        }

        $username = $_POST['username'];
        $email = $_POST['email'];

        $data = [
            'username' => $username
        ];

        $result = AuthHelper::forgotPassword($data);

        if(!$result){
            NotificationHelper::error('username_exist', 'Tài khoản không tồn tại này');
            header('Location: /forgot-password');
            exit;
        }

        if($result['email'] != $email){
            NotificationHelper::error('email_exist', 'Email không đúng');
            header('Location: /forgot-password');
            exit;
        }

        $_SESSION['reset_password'] = [
            'username' => $username,
            'email' => $email
        ];

        header('Location: /reset-password');
    }

    public static function resetPassword(){
        if(!isset($_SESSION['reset_password'])){
            NotificationHelper::error('reset_password', 'Vui lòng nhập đầy đủ thông tin');
            header('Location: /forgot-password');
            exit;
        }

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ResetPassword::render();
        Footer::render();
    }

    public static function resetPasswordAction(){
        $is_valid = AuthValidation::resetPassword();

        if(!$is_valid){
            NotificationHelper::error('reset_password', 'Đặt lại mật khẩu thất bại');
            header('Location: /reset-password');
            exit;
        }

        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $_SESSION['reset_password']['username'],
            'email' => $_SESSION['reset_password']['email'],
            'password' => $hash_password
        ];

        $result = AuthHelper::resetPassword($data);

        if($result){
            NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thành công');
            unset($_SESSION['reset_password']);
            header('Location: /login');
        } else {
            NotificationHelper::success('reset_password', 'Đặt lại mật khẩu thất bại');
            header('Location: /reset-password');
        }
    }

    

}