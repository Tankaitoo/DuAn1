<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\AuthValidation;
use App\Validations\CommentValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Comment\Create;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;
use GrahamCampbell\ResultType\Success;

class CommentController
{


    // hiển thị danh sách
    public static function index()
    {
        $Comment = new Comment();
        $data = $Comment->getAllCommentJoinAndUser();

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
        
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $comment = new Comment();
        $data = $comment->getOneCommentJoinProductAndUser($id);

        if(!$data){
            NotificationHelper::error('edit', 'Không thể xem bình luận này');
            header('Location : /admin/comments');
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
        //     header('location: /admin/comments');
        // }
    }


    // // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện cập nhật vào database';
        $is_valid = CommentValidation::edit();

        if(!$is_valid){
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            header("Location: /admin/comments/$id");
            exit;
        }

        $status = $_POST['status'];
        $comment = new Comment();

        $data = [
            'status' => $status
        ]; 

        $result = $comment->updateComment($id, $data);

        if($result){
            NotificationHelper::success('update', 'Cập nhật bình luận thành công');
            header('Location: /admin/comments');
        } else {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            header("Location: /admin/comments/$id");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        //echo 'Thực hiện xoá';
        //if(isset($_GET['id']) && $_GET['id']){
            $Comment = new Comment();
            $result = $Comment->deleteComment($id);
            
            if($result){
                NotificationHelper::success('delete', 'Xóa bình luận thành công');
            } else {
                NotificationHelper::error('delete', 'Xóa bình luận thất bại');
            }
            header('Location: /admin/comments');
        // }else{
        //     echo'Không có $_GET id';
        //     //header('Location: /admin/comments');
        // }
    }
}
