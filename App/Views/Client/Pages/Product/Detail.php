<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Detail extends BaseView
{
    public static function render($data = null)
    {
        // var_dump($_SESSION);
?>


        <div class="container mt-5 mb-5">

            <div class="row">
                <div class="col-md-6">
                    <img src="<?= APP_URL ?>/public/uploads/products/<?= $data['product']['image'] ?>" alt="" width="100%">
                </div>
                <div class="col-md-6">
                    <h5><?= $data['product']['name'] ?></h5>
                    <p>
                        <?= $data['product']['description'] ?>
                    </p>
                    <?php
                    if ($data['product']['discount_price'] > 0) :
                    ?>
                        <h6>Giá gốc: <strike><?= number_format($data['product']['price']) ?> đ</strike></h6>
                        <h6>Giá giảm: <strong class="text-danger"><?= number_format($data['product']['price'] - $data['product']['discount_price']) ?> đ</strong></h6>

                    <?php
                    else :
                    ?>
                        <h6>Giá tiền: <?= number_format($data['product']['price']) ?> đ</h6>
                    <?php
                    endif;
                    ?>

                    <form action="#" method="post">
                        <input type="hidden" name="method" id="" value="POST">
                        <input type="hidden" name="id" id="" value="<?= $data['product']['id'] ?>" required>
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

                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">

                                    <img src="<?= APP_URL ?>/public/uploads/users/user1.jpeg" alt="user" width="50" class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">Username</h6>
                                    <span class="m-b-15 d-block">Good product...</span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">2024-7-8 19:19:19</span>

                                        <button type="button" class="btn btn-cyan btn-sm" data-toggle="collapse" data-target="#comment" aria-expanded="false" aria-controls="comment">Sửa</button>
                                        <form action="#" method="post" onsubmit="return confirm('Chắc chưa?')" style="display: inline-block">
                                            <input type="hidden" name="method" value="DELETE" id="">
                                            <input type="hidden" name="product_id" value="" id="">
                                            <button type="submit" class="btn btn-danger btn-sm">Xoá</button>

                                        </form>
                                        <div class="collapse" id="comment">
                                            <div class="card card-body mt-5">
                                                <form action="#" method="post">
                                                    <input type="hidden" name="method" value="PUT" id="">
                                                    <input type="hidden" name="product_id" value="" id="">
                                                    <div class="form-group">
                                                        <label for="">Bình luận</label>
                                                        <textarea class="form-control rounded-0" name="content" id="" rows="3" placeholder="Nhập bình luận...">Good product...</textarea>
                                                    </div>
                                                    <div class="comment-footer">
                                                        <button type="submit" class="btn btn-cyan btn-sm">Gửi</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row comment-row">

                                <div class="p-2">

                                    <img src="<?= APP_URL ?>/public/uploads/users/user1.jpeg" alt="user" width="50" class="rounded-circle">
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

                        </div>


                    </div>
                </div>
            </div>
        </div>



<?php

    }
}
