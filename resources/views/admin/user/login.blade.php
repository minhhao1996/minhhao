<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hệ thống quản lý cơ sở dữ liệu</title>
    <link rel="shortcut icon" href="public/images/templates/favicon.png" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
   </head>
<body>
<div class="container khung">
    <div class="title">
        <h2 class="text-center" style="color:#8ac400">24hStore.vn</h2>
    </div>
    <hr>
    <div class="myform">
        <form name="form1" action="{{route('loginPost')}}" method="post" role="form">
            @csrf
            <div class="row form-row">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="email" name="email" class="form-control" required placeholder="Tên Email của bạn">
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-question-sign"></span>
                           </span>
                </div>
                <div class="error" id="password_error"></div>
            </div>
            <div class="row form-row">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-floppy-save"></span></span>
                    <input type="password" name="password" required class="form-control" placeholder="Mật khẩu">
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-question-sign"></span>
                           </span>
                </div>
                <div class="error" id="password_error"></div>
            </div>
            <div class="row form-row" style="width:100%; margin-top: 15px;">
                <button type="submit" class="form-control btn btn-primary btn-login">Đăng nhập</button>
            </div>
        </form>
    </div>
    <hr>
</div>
<nav class="navbar navbar-fixed-bottom" role="navigation">
    <div class="container">
        <h5 class="text-center">Copyright © 2018 <a href="https://www.facebook.com/trungphatit" style="color:red">MINHHAO</a>. All rights reserved.</h5>
    </div>
</nav>
<script src="{{asset('js/jquery-2.2.3.min.j')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>