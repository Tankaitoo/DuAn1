<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper{
    public static function register($data){
        $user = new User();
    
        $is_exist = $user->getOneUserByUsername($data['username']);

        if($is_exist){
            NotificationHelper::error('exist_register', 'Tên đăng nhập đã tồn tại');
            return false;
        }

        $result = $user->createUser($data);

        if($result){
            NotificationHelper::success('register', 'Đăng ký thành công');
            return true;
        }

        NotificationHelper::error('register', 'Đăng ký thất bại');
        return false;
    
    }

    public static function login($data){
        //kiểm tra tồn tại username data
    
        $user = new User();

        $is_exist = $user->getOneUserByUsername($data['username']);

        if(!$is_exist){
            NotificationHelper::error('username', 'Tên đăng nhập không chính xác');
            return false;
        }

        if(!password_verify($data['password'], $is_exist['password'])){
            NotificationHelper::error('password', 'Mật khẩu không chính xác');
            return false;
        }

        if($is_exist['status'] == 0){
            NotificationHelper::error('status', 'Tài khoản đã bị khóa');
            return false;
        }

        if($data['remember']){
            //lưu cookie, lưu session
            self::updateCookie($is_exist['id']);
        } else {
            //lưu session
            self::updateSession($is_exist['id']);
        }

        NotificationHelper::success('login','Đăng nhập thành công');
        return true;
    }

    public static function updateCookie(int $id){
        $user = new User();

        $result = $user->getOneUser($id);

        if($result){
            $user_data = json_encode($result);

            setcookie('users', $user_data, time() + 3600 * 24 * 30 * 12,'/');

            $_SESSION['users'] = $result;
        }
    }

    public static function updateSession(int $id){
        $user = new User();
        $result = $user->getOneUser($id);

        if($result){

            $_SESSION['users'] = $result;
        }
    }

    
    public static function checkLogin(){
        if(isset($_COOKIE['users'])){
            $user = $_COOKIE['users'];
            $user_data = json_decode($user);

            //self::updateCookie($user_data['id']);

            $_SESSION['users'] = (array) $user_data;

            return true;
        }

        if(isset($_SESSION['users'])){
            self::updateCookie($_SESSION['users']['id']);
            return true;
        }

        return false;
    }

    public static function logout(){
        if(isset($_SESSION['users'])){
            unset($_SESSION['users']);
        }

        if(isset($_COOKIE['users'])){
            setcookie('users','', time() - 3600 * 24 * 30 * 12, '/');
        }
    }

    public static function edit($id): bool{
        if(!self::checkLogin()){
            NotificationHelper::error('login','Vui lòng đăng nhập để xem thông tin');
            return false;
        }

        $data = $_SESSION['users'];
        $user_id = $data['id'];

        if(isset($_COOKIE['users'])){
            self::updateCookie($user_id);
        }

        self::updateSession($user_id);

        if($user_id != $id){
            NotificationHelper::error('user_id', 'Không có quyền xem thông tin tài khoản này');
            return false;
        }

        return true;
    }
    
    public static function update($id, $data){
        $user = new User();
        $result = $user->update($id, $data);

        if(!$result){
            NotificationHelper::error('update_user', 'Cập nhật thông tin thất bại');
            return false;
        }

        if($_SESSION['users']){
            self::updateSession($id);
        }

        if($_COOKIE['users']){
            self::updateCookie($id);
        }

        NotificationHelper::success('update_user', 'Cập nhật thông tin tài khoản thành công');
        return true;
    }

    public static function changePassword($id, $data){
        //kiển tra mật khẩu cũ có trùng csdl
        $user = new User();
        $result = $user->getOneUser($id);

        if(!$result){
            NotificationHelper::error('account', 'Tài khoản không tồn tại');
            return false;
        }

        //kiển tra mật khẩu cũ có trùng csdl
        if(!password_verify($data['old_password'], $result['password'])){
            NotificationHelper::error('password_verify', 'Mật khẩu cũ không chính xác');
            return false;
        }

        //mã hóa mật khẩu trước khi lên
        $hash_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

        $data_update = [
            'password' => $hash_password
        ];

        $result_update = $user->updateUser($id, $data_update);

        if($result_update){
            if(isset($_COOKIE['users'])){
                self::updateCookie($id);
            }

            self::updateSession($id);

            NotificationHelper::success('change-password', 'Đổi mật khẩu thành công');
            return true;
        }
        else{
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            return false;
        }
    }

    public static function forgotPassword($data){
        $user = new User();

        $result = $user->getOneUserByUsername($data['username']);

        return $result;
    }

    public static function resetPassword($data){
        $user = new User();
        $result = $user->updateUserByUsernameAndEmail($data);

        return $result;
    }

    public static function middleware(){
        $admin = explode('/', $_SERVER['REQUEST_URI']);
        $admin = $admin[1];
        if($admin == 'admin'){
            // if(!isset($_SESSION['users']) || $_SESSION['users']['role'] != 1){
            //     NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
            //     header('Location: /login');
            //     exit;
            // }

            if(!isset($_SESSION['users'])){
                NotificationHelper::error('admin', 'Vui lòng đăng nhập');
                header('Location: /login');
                exit;
            }

            if($_SESSION['users']['role'] != 1){
                NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập trang quản trị');
                header('Location: /login');
                exit;
            }
        }
    }
}
