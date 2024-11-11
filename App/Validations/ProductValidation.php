<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductValidation{
    public static function create(): bool{
        $is_valid = true;

        if (!isset($_POST['name']) || $_POST['name'] === ''){
            NotificationHelper::error('name', 'Không để trống tên sản phẩm');
            $is_valid = false;
        }

        if (!isset($_POST['price']) || $_POST['price'] === ''){
            NotificationHelper::error('price', 'Không để trống giá tiền');
            $is_valid = false;
        }elseif((int) $_POST['price'] <= 0){
            NotificationHelper::error('price', 'Giá tiền phải lớn hơn 0');
            $is_valid = false;
        }

        if (!isset($_POST['discount_price']) || $_POST['discount_price'] === ''){
            NotificationHelper::error('discount_price', 'Không để trống giá giảm');
            $is_valid = false;
        }elseif((int) $_POST['discount_price'] < 0){
            NotificationHelper::error('discount_price', 'Giá giảm phải lớn hơn hoặc bằng 0');
            $is_valid = false;
        }elseif((int) $_POST['discount_price'] > (int) $_POST['price']){
            NotificationHelper::error('discount_price', 'Giá giảm phải nhỏ hơn giá tiền');
            $is_valid = false;
        }

        if (!isset($_POST['category_id']) || $_POST['category_id'] === ''){
            NotificationHelper::error('category_id', 'Không để trống loại sản phẩm');
            $is_valid = false;
        }

        if (!isset($_POST['is_feature']) || $_POST['is_feature'] === ''){
            NotificationHelper::error('is_feature', 'Không để trống nổi bật');
            $is_valid = false;
        }

        if (!isset($_POST['status']) || $_POST['status'] === ''){
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit(): bool{
        return self::create();
    }

    public static function uploadImage(){
        if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
            return false;
        }

        //nơi lưu trữ hình ảnh trong sourcecode
        $target_dir = 'public/uploads/products/';

        //kiểm tra file ảnh
        $imageFileType = strtolower(pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION));

        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
            NotificationHelper::error('type_upload', 'Chỉ nhận file ảnh JPG, PNG, JPEG, GIF');
            return false;
        }

        //thay đổi tên file thành dạng năm tháng ngày giờ phút giây
        $nameImage = date('YmdHmi') . '.' . $imageFileType;

        //đường dẫn đầy đủ để di chuyển file
        $target_file = $target_dir.$nameImage;

        if(!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
            NotificationHelper::error('move_upload', 'Không thể tải ảnh vào thư mục đã lưu trữ');
            return false;
        }

        return $nameImage;
    }
}
?>