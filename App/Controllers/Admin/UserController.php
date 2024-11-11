<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\AuthValidation;
use App\Validations\UserValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\User\Create;
use App\Views\Admin\Pages\User\Edit;
use App\Views\Admin\Pages\User\Index;
use GrahamCampbell\ResultType\Success;

class UserController
{


    // hiển thị danh sách
    public static function index()
    {
        $user = new User();
        $data = $user->getAllUser();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    //hiển thị giao diện form thêm
    public static function create()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }

    // // public static function register()
    // // {
    // //     Header::render();
    // //     // hiển thị form thêm
    // //     AuthValidation::register();
    // //     Footer::render();
    // // }

    // // public static function login()
    // // {
    // //     Header::render();
    // //     // hiển thị form thêm
    // //     AuthValidation::login();
    // //     Footer::render();
    // // }

    // // xử lý chức năng thêm
    public static function store()
    {
        $is_valid = UserValidation::create();

        if(!$is_valid){
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('Location: /admin/users/create');
            exit;
        }

        $username = $_POST['username'];
        //kiểm tra tên đăng nhập trùng tên
        $User = new User();
        $is_exist = $User->getOneUserByUsername($username);

        if($is_exist){
            NotificationHelper::error('store', 'Tên người dùng đã tồn tại');
            header('Location: /admin/users/create');
            exit;
        }

        $data = [
            'username' => $username,
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'password' => md5($_POST['password'], PASSWORD_DEFAULT),
            'status' => $_POST['status']
        ]; 

        $is_upload = UserValidation::uploadAvatar();
        if($is_upload){
            $data['avatar'] = $is_upload;
        }

        $result = $User->createUser($data);

        if($result){
            NotificationHelper::success('store', 'Thêm người dùng thành công');
            header('Location: /admin/users');
        } else {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('Location: /admin/users/create');
        }
    }


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $user = new User();
        $data = $user->getOneUser($id);

        if(!$data){
            NotificationHelper::error('edit', 'Không thể xem người dùng này');
            header('Location : /admin/users');
            exit;
        }

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();

        // if ($data) {
        //     Header::render();
        //     // hiển thị form sửa
        //     Edit::render($data);
        //     Footer::render();
        // } else {
        //     header('location: /admin/users');
        // }
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện cập nhật vào database';
        $is_valid = UserValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("Location: /admin/users/$id");
            exit;
        }

        //kiểm tra tên loại trùng tên
        $user = new User();

        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'status' => $_POST['status']
        ]; 

        if($_POST['password'] !== ''){
            $data['password'] = md5($_POST['password'], PASSWORD_DEFAULT);
        }

        $is_upload = UserValidation::uploadAvatar();

        if($is_upload){
            $data['avatar'] = $is_upload;
        }

        $result = $user->updateUser($id, $data);

        if($result){
            NotificationHelper::success('update', 'Cập nhật người dùng thành công');
            header('Location: /admin/users');
        } else {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("Location: /admin/users/$id");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        //echo 'Thực hiện xoá';
        //if(isset($_GET['id']) && $_GET['id']){
            $user = new User();
            $result = $user->deleteUser($id);
            
            if($result){
                NotificationHelper::success('delete', 'Xóa người dùng thành công');
            } else {
                NotificationHelper::error('delete', 'Xóa người dùng thất bại');
            }
            header('Location: /admin/users');
        // }else{
        //     echo'Không có $_GET id';
        //     //header('Location: /admin/users');
        // }
    }
}
