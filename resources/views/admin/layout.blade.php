<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <head>
        <base href="http://minhhao.vn/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hệ thống quản lý cơ sở dữ liệu</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- <link rel="shortcut icon" href="public/images/templates/favicon.png" /> -->
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/my.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins-->
        <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
        <script src="ckeditor/ckeditor.js"></script>
        <script src="{{asset('js/loader.js')}}"></script>


        <link id="load-css-0" rel="stylesheet" type="text/css"
              href="https://www.gstatic.com/charts/45/css/util/util.css">
        <link id="load-css-1" rel="stylesheet" type="text/css"
              href="https://www.gstatic.com/charts/45/css/core/tooltip.css">
    </head>
</head>
<body class="skin-blue sidebar-mini">
<script type="text/javascript" src="https://www.gstatic.com/charts/45/loader.js"></script>
<div class="wrapper">
    <!-- Vung Header -->
    <header class="main-header">
        <a href="{{url('admin')}}" class="logo">
            <span class="logo-mini"><b>P</b>S</span>
            <span class="logo-lg">Quản trị hệ thống</span>
        </a>
        <nav class="navbar navbar-static-top" style="height: 52px">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav" style="height: 52px;  padding: 1px">
                    <li style="height: 52px">
                        <a href="{{url('index')}}">
                            <span class="glyphicon glyphicon-home"></span>
                            <span>Website</span>
                        </a>
                    </li>
                    <li class="dropdown user user-menu" style="height: 52px; padding: 0px">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('upload/avatar/admin.png')}}" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">Supper Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="public/images/admin/a22aeef917ae5c59006182ced50f72e8.png" class="img-circle"
                                     alt="User Image">
                                <p>Supper Admin
                                    <small>0167892</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="http://[::1]/TTTN-Green/admin/useradmin/update/4"
                                       class="btn btn-default btn-flat">Chi tiết</a>
                                </div>
                                <div class="pull-right">
                                    <a href="admin/user/logout.html" class="btn btn-default btn-flat">Thoát</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- ./Vung Header -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('upload/avatar/admin.png')}}" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Supper Admin</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header">CHỨC NĂNG</li>
                <li class="treeview">
                    <a href="http://[::1]/TTTN-Green/admin">
                        <i class="fa fa-bar-chart"></i> <span>Thống kê</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="http://[::1]/TTTN-Green/admin/contact">
                        <i class="fa fa-envelope"></i> <span>Liên hệ</span>
                    </a>
                </li>
                <li class="header">QUẢN LÝ DANH MỤC</li>
                <li class="treeview">
                    <a href="{{ url('admin/catalog') }}">
                        <i class="fa fa-indent"></i><span>Loại sản phẩm</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{ url('admin/maker') }}">
                        <i class="fa fa-gift"></i><span>Nhà cung cấp</span>
                    </a>
                </li>
                <li class="header">QUẢN LÝ CỬA HÀNG</li>
                <li>
                    <a href="{{ url('admin/product') }}">
                        <i class="fa fa-leaf"></i> Sản phẩm
                    </a>
                </li>
                <li>
                    <a href="http://[::1]/TTTN-Green/admin/content">
                        <i class="glyphicon glyphicon-list"></i> Tin tức
                    </a>
                </li>
                <li>
                    <a href="http://[::1]/TTTN-Green/admin/orders">
                        <i class="fa fa-shopping-cart"></i> Đơn hàng
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ url('admin/user') }}">
                        <i class="fa fa-user"></i><span>Khách hàng</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="http://[::1]/TTTN-Green/admin/province">
                        <i class="fa fa-globe"></i><span>Địa điểm</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-align-justify"></i><span>Giao diện</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="http://[::1]/TTTN-Green/admin/sliders">
                                <i class="fa fa-cogs"></i> Sliders
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="header">CÀI ĐẶT</li>
                <li class="treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-cog"></i><span>Hệ thống</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="http://[::1]/TTTN-Green/admin/configuration/update">
                                <i class="fa fa-cogs"></i> Cấu hình
                            </a>
                        </li>
                        <li>
                            <a href="http://[::1]/TTTN-Green/admin/group">
                                <i class="fa fa-lock"></i> Nhóm người dùng
                            </a>
                        </li>
                        <li>
                            <a href="http://[::1]/TTTN-Green/admin/useradmin">
                                <i class="fa fa-users"></i> Thành viên
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out text-red"></i> <span>Thoát</span></a></li>
                <li><a href="#"><i class="fa fa-question-circle text-yellow"></i> <span>Trợ giúp</span></a></li>
            </ul>

        </section>
    </aside>
    <div class="content-wrapper" style="min-height: 785px;">

            @yield('content')

    </div>

    <!-- /.content-wrapper -->


    <footer class="main-footer">
        <div class="pull-right hidden-xs"><b>Version</b> 2.3.5</div>
        <p class="text-center">Copyright © 2017 <a href="http://facebook.com/trungphatit">PYWeb</a>. All rights
            reserved.
        </p>
    </footer>

</div><!-- ./wrapper -->
<!-- jQuery 2.2.3 -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/my.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/45/js/jsapi_compiled_format_module.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/45/js/jsapi_compiled_default_module.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/45/js/jsapi_compiled_ui_module.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/45/js/jsapi_compiled_corechart_module.js"></script>


</body>
</html>
