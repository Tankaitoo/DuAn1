<?php
namespace App\Views\Client\Checkout;

use App\Views\BaseView;

class OrderSuccess extends BaseView
{
    public static function render($data = null)
    {

        ?>

        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Đặt hàng thành công!</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>