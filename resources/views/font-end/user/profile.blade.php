@extends('layouts.app')

@section('content')
    @include('layouts.menuMain')

    <style>

    </style>
    <div class="main">
        <div class="container">
            <div class="row">
                @include('font-end/user.menuProfile')
                <div class="col-md-9">
                    @if($profile['avatar'] ==null)
                        <div class="avatar"><img src="{{asset('images/avatar.jpg')}}"></div>
                    @else
                        <div class="avatar"><img class="product-av" src="{{asset('images/avatar/'.$profile['avatar'])}}"></div>
                    @endif
                    <div class="myorder-content clearfix">
                        <div class="menu-account ng-scope" ng-controller="accountController">
                            <h3><span>Thông Tin thành viên</span>
                            </h3>
                            <ul>
                                <li><a href="">Name: {{$profile['name']}}</a></li>
                                <li><a href=""> Email: {{$profile['email']}}</a></li>
                                <li><a>Password: ************   </a></li>
                                @if($profile['sex']==1)
                                <li><a href=""> Giới Tính: Nam</a></li>
                                    @elseif($profile['sex']==2)
                                        <li><a href=""> Giới Tính: Nữ</a></li>
                                    @endif
                                <li><a href=""> Ngày sinh: {{$profile['birthday']}}</a></li>
                                <li><a href=""> Sđt: {{$profile['phone']}}</a></li>
                                @foreach($city as $ci)
                                @foreach($district as $dis)
                                <li><a href=""> Địa chỉ: {{$profile['address']}}, {{$dis['name']}}, {{$ci['name']}}
                                    </a></li>
                                    @endforeach
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection