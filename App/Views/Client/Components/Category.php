<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            .card-body h5 {
                font-size: 1.2rem;
                color: #34495e;
            }

            .nav-link {
                color: #7f8c8d;
                border-radius: 5px;
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                background-color: #ecf0f1;
                color: #3498db;
                text-decoration: none;
            }

            .nav-link.active {
                background-color: #e0e0e0;
                color: #2c3e50;
                font-weight: 600;
            }

            .nav {
                border-top: 1px solid #ddd;
                padding-top: 1rem;
            }

            .nav a {
                margin-bottom: 0.5rem;
            }
        </style>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h5 class="text-center mb-4 font-weight-bold text-uppercase">Danh Mục</h5>
                <nav class="nav flex-column">
                    <a class="nav-link active text-dark fw-bold py-2 px-3 rounded" href="/products" style="background-color: #f8f9fa;">Tất cả</a>
                    <?php foreach ($data as $item) : ?>
                        <a
                            class="nav-link text-muted py-2 px-3 rounded"
                            href="/products/categories/<?= $item['id'] ?>"
                            style="transition: background-color 0.3s;">
                            <?= $item['name'] ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>


<?php
    }
}
