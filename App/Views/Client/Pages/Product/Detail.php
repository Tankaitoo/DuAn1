<?php

namespace App\Views\Client\Pages\Product;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();
?>


        <div class="container mt-5 mb-5">

            <div class="row">
                <div class="col-md-6">
                    <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['products']['image'] ?>" alt="" width="100%">
                </div>
                <div class="col-md-6">
                    <h5><?= $data['products']['name'] ?></h5>
                    <p>
                        <?= $data['products']['description'] ?>
                    </p>
                    <?php
                    if ($data['products']['discount_price'] > 0) :
                    ?>
                        <h6>Giá gốc: <strike><?= number_format($data['products']['price']) ?> đ</strike></h6>
                        <h6>Giá giảm: <strong class="text-danger"><?= number_format($data['products']['price'] - $data['products']['discount_price']) ?> đ</strong></h6>

                    <?php
                    else :
                    ?>
                        <h6>Giá tiền: <?= number_format($data['products']['price']) ?> đ</h6>
                    <?php
                    endif;
                    ?>

                    <h6>Danh mục: <?= $data['products']['category_name'] ?></h6>

                    <form action="#" method="post">
                        <input type="hidden" name="method" id="" value="POST">
                        <input type="hidden" name="id" id="" value="<?= $data['products']['id'] ?>" required>
                        <button type="submit" class="btn btn-sm btn-outline-success">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-100 mb-100">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">Bình luận mới nhất</h4>
                        </div>
                        <div class="comment-widgets">
                            <?php
                            if (isset($data) && isset($data['comments']) && $data && $data['comments']) :
                                foreach ($data['comments'] as $item) :
                            ?>
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2">
                                            <?php
                                            if ($item['avatar']) :
                                            ?>
                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['avatar'] ?>" alt="user" width="50" class="rounded-circle">

                                            <?php else :
                                            ?>

                                                <img src="<?= APP_URL ?>/public/uploads/users/userimg.jpg" alt="user" width="50" class="rounded-circle">

                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><?= $item['name'] ?> - <?= $item['username'] ?></h6>
                                            <span class="m-b-15 d-block"><?= $item['content'] ?></span>
                                            <div class="comment-footer">
                                                <span class="text-muted float-right"><?= $item['date'] ?></span>

                                                <?php
                                                if (isset($data) && $is_login && ($_SESSION['users']['id'] == $item['user_id'])) :
                                                ?>

                                                    <button type="button" class="btn btn-cyan btn-sm" data-toggle="collapse" data-target="#<?= $item['username'] ?><?= $item['id'] ?>" aria-expanded="false" aria-controls="comment">Sửa</button>
                                                    <form action="#" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
                                                        <input type="hidden" name="method" value="DELETE" id="">
                                                        <input type="hidden" name="product_id" value="" id="">
                                                        <button type="submit" class="btn btn-danger btn-sm">Xoá</button>

                                                    </form>
                                                    <div class="collapse" id="<?= $item['username'] ?><?= $item['id'] ?>">
                                                        <div class="card card-body mt-5">
                                                            <form action="#" method="post">
                                                                <input type="hidden" name="method" value="PUT" id="">
                                                                <input type="hidden" name="product_id" value="" id="">
                                                                <div class="form-group">
                                                                    <label for="">Bình luận</label>
<textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..."><?= $item['content'] ?></textarea>
                                                                </div>
                                                                <div class="comment-footer">
                                                                    <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>

                                                <?php
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                endforeach;
                            else :
                                ?>
                                <h6 class="text-center text-danger">Chưa có bình luận</h6>
                            <?php
                            endif;
                            ?>

                            <?php
                            if (isset($data) && $is_login) :
                            ?>

                                <div class="d-flex flex-row comment-row">

                                    <div class="p-2">

                                        <img src="<?= APP_URL ?>/public/uploads/users/userimg.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Username</h6>
                                        <form action="#" method="post">
                                            <input type="hidden" name="method" value="POST" id="" required>
                                            <div class="form-group">
                                                <label for="">Bình luận</label>
                                                <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận..." required></textarea>
                                            </div>
                                            <div class="comment-footer">
                                                <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            <?php
                            else :
                            ?>
<h6 class="text-center text-danger">Vui lòng đăng nhập để có bình luận</h6>


                            <?php
                            endif;
                            ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>



<?php

    }
}