<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        
        if (isset($_SESSION['success'])) :
            foreach ($_SESSION['success'] as $key => $value) :
?>
            <div class="page-wrapper">
                <div class="alert alert-success alert-dismissible">
                    <strong><?= $value ?></strong>
                </div>
            </div>
        <?php
            endforeach;
        endif;
        ?>

        <?php
        if (isset($_SESSION['error'])) :
            foreach ($_SESSION['error'] as $key => $value) :
        ?>
            <div class="page-wrapper">
                <div class="alert alert-danger alert-dismissible">
                    <strong><?= $value ?></strong>
                </div>
            </div>    
<?php
            endforeach;

        endif;
    }
}

?>