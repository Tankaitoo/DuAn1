<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {

?>
        <!DOCTYPE html>
        <html dir="ltr" lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin</title>
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="<?= APP_URL ?>/public/assets/admin/images/favicon.png">
            <!-- CSS -->
            <link href="<?= APP_URL ?>/public/assets/admin/libs/flot/css/float-chart.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/extra-libs/multicheck/multicheck.css">
            <link href="<?= APP_URL ?>/public/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/select2/dist/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/jquery-minicolors/jquery.minicolors.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/quill/dist/quill.snow.css">

            <!-- Custom CSS -->
            <link href="<?= APP_URL ?>/public/assets/admin/dist/css/style.min.css" rel="stylesheet">

        </head>

        <body>

            <!-- ============================================================== -->
            <!-- Main wrapper - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <header class="topbar" data-navbarbg="skin5">
                    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                        <div class="navbar-header" data-logobg="skin5">

                            <!-- ============================================================== -->
                            <!-- Logo -->
                            <!-- ============================================================== -->
                            <a class="navbar-brand" href="/admin">
                                <!-- Logo icon -->
                                <b class="logo-icon ps-2">
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                    <!-- Dark Logo icon -->
                                    <img src="<?= APP_URL ?>/public/assets/admin/images/logo-icon.png" alt="homepage" class="light-logo" />

                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text -->
                                <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img src="<?= APP_URL ?>/public/assets/admin/images/logo-text.png" alt="homepage" class="light-logo" />

                                </span>
                                <!-- Logo icon -->
                                <!-- <b class="logo-icon"> -->
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <!-- <img src="<?= APP_URL ?>/public/assets/admin/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                                <!-- </b> -->
                                <!--End Logo icon -->
                            </a>
                            <!-- ============================================================== -->
                            <!-- End Logo -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Toggle which is visible on mobile only -->
                            <!-- ============================================================== -->
                            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-start me-auto">
                                <li class="nav-item d-none d-lg-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                                <!-- ============================================================== -->
                            </ul>
                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-end">                
                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?= APP_URL ?>/public/assets/admin/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href=""><i class="fa fa-power-off me-1 ms-1"></i> Đăng xuất</a>
                                    </ul>
                                </li>
                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar" data-sidebarbg="skin5">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav" class="pt-4">
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Thống kê</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Loại sản phẩm </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="/admin/categories" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Danh sách </span></a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="/admin/categories/create" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Thêm mới </span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Sản phẩm </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="/admin/products" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Danh sách </span></a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="/admin/products/create" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Thêm mới </span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Bình luận </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="/admin/comments" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Danh sách </span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-item p-3">
                                    <a href="https://github.com/wrappixel/matrix-admin-lite" target="_blank" class="w-100 btn btn-cyan d-flex align-items-center text-white"><i class="mdi mdi-cloud-download font-20 me-2"></i>Theme</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

        <?php

    }
}

        ?>