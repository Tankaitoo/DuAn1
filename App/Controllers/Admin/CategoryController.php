<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Validations\AuthValidation;
use App\Validations\CategoryValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Category\Create;
use App\Views\Admin\Pages\Category\Edit;
use App\Views\Admin\Pages\Category\Index;
use GrahamCampbell\ResultType\Success;

class CategoryController
{


    // hiển thị danh sách
    public static function index()
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     [
        //         'id' => 1,
        //         'name' => 'Category 1',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Category 2',
        //         'status' => 1
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => 'Category 3',
        //         'status' => 0
        //     ],

        // ];

        $category = new Category();
        $data = $category->getAllCategory();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        Create::render();
        Footer::render();
    }

    // public static function register()
    // {
    //     Header::render();
    //     // hiển thị form thêm
    //     AuthValidation::register();
    //     Footer::render();
    // }

    // public static function login()
    // {
    //     Header::render();
    //     // hiển thị form thêm
    //     AuthValidation::login();
    //     Footer::render();
    // }

    // xử lý chức năng thêm
    public static function store()
    {
        $is_valid = CategoryValidation::create();

        if(!$is_valid){
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
            header('Location: /admin/categories/create');
            exit;
        }

        $name = $_POST['name'];
        $status = $_POST['status'];
        //kiểm tra tên loại trùng tên
        $category = new Category();
        $is_exist = $category->getOneCategoryByName($name);

        if($is_exist){
            NotificationHelper::error('store', 'Tên loại sản phẩm đã tồn tại');
            header('Location: /admin/categories/create');
            exit;
        }

        $data = [
            'name' => $name,
            'status' => $status
        ]; 

        $result = $category->createCategory($data);

        if($result){
            NotificationHelper::success('store', 'Thêm loại sản phẩm thành công');
            header('Location: /admin/categories');
        } else {
            NotificationHelper::error('store', 'Thêm loại sản phẩm thất bại');
            header('Location: /admin/categories/create');
        }
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // giả sử data là mảng dữ liệu lấy được từ database
        // $data = [
        //     'id' => $id,
        //     'name' => 'Category 1',
        //     'status' => 1
        // ];
        $category = new Category();
        $data = $category->getOneCategory($id);

        if(!$data){
            NotificationHelper::error('edit', 'Không thể xem loại sản phẩm này');
            header('Location : /admin/categories');
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
        //     header('location: /admin/categories');
        // }
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện cập nhật vào database';
        $is_valid = CategoryValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
            header("Location: /admin/categories/$id");
            exit;
        }

        $name = $_POST['name'];
        $status = $_POST['status'];
        //kiểm tra tên loại trùng tên
        $category = new Category();
        $is_exist = $category->getOneCategoryByName($name);

        if($is_exist){
            if($is_exist['id'] != $id){
                NotificationHelper::error('update', 'Tên loại sản phẩm đã tồn tại');
                header("Location: /admin/categories/$id");
                exit;
            }
        }

        $data = [
            'name' => $name,
            'status' => $status
        ]; 

        $result = $category->updateCategory($id, $data);

        if($result){
            NotificationHelper::success('update', 'Cập nhật loại sản phẩm thành công');
            header('Location: /admin/categories');
        } else {
            NotificationHelper::error('update', 'Cập nhật loại sản phẩm thất bại');
            header("Location: /admin/categories/$id");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        //echo 'Thực hiện xoá';
        //if(isset($_GET['id']) && $_GET['id']){
            $category = new Category();
            $result = $category->deleteCategory($id);
            
            if($result){
                NotificationHelper::success('delete', 'Xóa loại sản phẩm thành công');
            } else {
                NotificationHelper::error('delete', 'Xóa loại sản phẩm thất bại');
            }
            header('Location: /admin/categories');
        // }else{
        //     echo'Không có $_GET id';
        //     //header('Location: /admin/categories');
        // }
    }
}
