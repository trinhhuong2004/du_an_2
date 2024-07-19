<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>LTH Furniture</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="public/assets_admin/images/logo.png">
    <link href="../admin/public/assets_admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../admin/public/assets_admin/css/icons.css" rel="stylesheet" type="text/css">
    <link href="../admin/public/assets_admin/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/8e3c294816.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</head>

<style>
    label.error {
        color: red;
        font-size: 16px;
        margin-top: 5px;
        display: block;
    }
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 93%;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

   
</style>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div> -->
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid d-flex justify-content-between ">
                <!-- Logo container-->
                <div class="logo">
                    <a href="index.html" class="logo">
                        <img class="hide-phone" style="width: 120px;" src="../admin/public/assets_admin/images/logo.png" alt="">
                    </a>
                </div>
                <!-- End Logo container-->
                <div class="menu-extras topbar-custom ">
                    <ul class="list-unstyled float-right mb-0">
                        <!-- language-->
                        <li class="dropdown notification-list hide-phone">

                            <div class="dropdown-menu dropdown-menu-right language-switch">
                                <a class="dropdown-item" href="#">
                                    <img src="../admin/public/assets_admin/images/flags/Flag_Vietnam.svg.png" alt="" height="16">
                                    <span>Vietnamese</span>
                                </a>
                            </div>
                        </li>

                        <!-- User-->
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="../admin/public/assets_admin/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown border-0">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5>Welcome</h5>
                                </div>
                                <a class="dropdown-item" href="../index.php?act=edit_account">
                                    <i class="mdi mdi-account-circle m-r-5 text-muted"></i> Thông tin </a>
                                <a class="dropdown-item" href="../index.php?act=home">
                                    <i class="fa-solid fa-house mdi m-r-5 text-muted"></i>  Trang người dùng </a>
                                <a class="dropdown-item" href="?act=logout">
                                    <i class="mdi mdi-logout m-r-5 text-muted"></i> Đăng xuất </a>
                            </div>
                        </li>
                        <li class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                    </ul>
                </div>
                <!-- end menu-extras -->
                <!-- <div class="clearfix "></div> -->
            </div>
            <!-- end container -->
        </div>
        <!-- end topbar-main -->
        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="index.php">
                                <i class="dripicons-device-desktop"></i>Bảng điều khiển </a>
                        </li>
                        <li class="has-submenu">
                            <a href="?act=list_catalog">
                                <i class="fa-regular fa-rectangle-list"></i>Danh mục</a>
                        </li>
                        <li class="has-submenu">
                            <a href="?act=list_product">
                                <i class="dripicons-blog"></i>Sản phẩm</a>
                        </li>
                        <li class="has-submenu">
                            <a href="?act=list_cmt">
                                <i class="fa-regular fa-comment"></i></i>Bình luận </a>
                        </li>
                        <!-- <li class="has-submenu">
                            <a href="?act=list_voucher">
                                <i class="fa-solid fa-gift"></i>Khuyến mại</a>
                        </li> -->
                        <li class="has-submenu">
                            <a href="?act=list_order">
                                <i class="dripicons-copy"></i>Đơn hàng</a>
                        </li>
                        <li class="has-submenu">
                            <a href="?act=list_account">
                                <i class="fa-regular fa-user"></i>Tài khoản</a>
                        </li>
                    </ul>
                    <!-- End navigation menu -->
                </div>
                <!-- end #navigation -->
            </div>
            <!-- end container -->
        </div>
        <!-- end navbar-custom -->
    </header>