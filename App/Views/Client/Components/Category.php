<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <h5 class="text-center mb-3">Danh mục</h5>
        <nav class="nav flex-column border-right">
            <a class="nav-link active" href="/products">Tất cả</a>
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
