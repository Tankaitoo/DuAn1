<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <h5 class="text-center mb-3">DANH MỤC</h5>
        <nav class="nav flex-column border-right">
            <a class="nav-link active" href="/products">TẤT CẢ</a>
            <?php
            foreach ($data as $item) :
            ?>
                <a class="nav-link" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a>
            <?php
            endforeach;
            ?>
        </nav>

<?php
    }
}
