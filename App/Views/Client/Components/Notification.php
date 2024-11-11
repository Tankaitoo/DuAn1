<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        if (isset($_SESSION['success'])) :
            foreach ($_SESSION['success'] as $key => $value) :
?>

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= $value ?></strong>
                </div>

        <?php
            endforeach;
        endif;
        ?>

        <?php
        if (isset($_SESSION['error'])) :
            foreach ($_SESSION['error'] as $key => $value) :
        ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= $value ?></strong>
                </div>
<?php
            endforeach;

        endif;
    }
}

?>