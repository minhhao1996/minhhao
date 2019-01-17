
<main class="py-4">
    <div id="header" class="header">
        <section class="top-link clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <ul class="nav navbar-right topmenu  hidden-xs hidden-sm">
                            <li class="order-check"><a href="/kiem-tra-don-hang.html"><i
                                            class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li>
                            <li class="order-cart"><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                            </li>
                            @guest
                                <li>
                                    <a href="{{url('login')}}"><i class="fa fa-key"></i> Đăng nhập</a>
                                </li>
                                <li>
                                    <a href="{{url('register')}}"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                </li>

                            @else
                                <li>
                                    <a href="{{url('profile')}}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>


                            @endguest
                        </ul>
                        <div class="show-mobile hidden-lg hidden-md">
                            <div class="quick-user">
                                <div class="quickaccess-toggle">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="inner-toggle">
                                    <ul class="login links">
                                        @guest
                                            <li>
                                                <a href="{{url('register')}}"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                            </li>
                                            <li>
                                                <a href="{{url('login')}}"><i class="fa fa-key"></i> Đăng nhập</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{url('profile',Auth::user()->id)}}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>

                                        @endguest
                                    </ul>
                                </div>
                            </div>
                            <div class="quick-access">
                                <div class="quickaccess-toggle">
                                    <i class="fa fa-list"></i>
                                </div>
                                <div class="inner-toggle">
                                    <ul class="links">
                                        <li><a id="mobile-wishlist-total" href="/kiem-tra-don-hang.html"
                                               class="wishlist"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a>
                                        </li>
                                        <li><a href="/gio-hang.html" class="shoppingcart"><i
                                                        class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- MAIN HEADER -->
        <div class="container main-header">
            <div class="row">
                <div class="col-xs-12 col-sm-3 logo">
                    <a href="/" class="logo" title="C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME">
                        <img src="{{asset('font-end/img/logo2.png')}}"
                             alt="C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME"
                             title="C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME">
                    </a>
                    <h1 style="display: none;">
                        C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME
                    </h1>
                </div>
                <div class="col-xs-7 col-sm-7 header-search-box">
                    @include('layouts.search')
                </div>
                <div class="col-xs-5 col-sm-2 group-button-header new-login">
                    <a title="Đăng nhập" href="{{url('login')}}" class="btn-heart"></a>
                    <div class="btn-cart" id="cart-block">
                        <a title="My cart" href="{{url('cart')}}">Giỏ hàng</a>
                        <span class="text-show">Giỏ hàng</span>
                        <span class="notify notify-right">{{$qty}} </span>

                        <div class="cart-block">

                            <div class="cart-block-content">
                                <h5 class="cart-title">Bạn hiện có {{$qty}} sản phẩm</h5>

                                <div class="cart-block-list">
                                    <ul>
                                        @foreach($data as $row)
                                            <li class="product-info">
                                                <div class="p-left">
                                                    <a href="javascript:void(0);" class="remove_link"
                                                       onclick="RemoveItemCard(51002,0)"></a>
                                                    <a  href="{{url('details',$row['id'])}}">
                                                        <img class="img-responsive" style="height: 70px"
                                                             src="{{asset('upload/product/avatar')}}/{{$row['attributes']['img']}}"
                                                             alt="   {{$row['name']}}">
                                                    </a>
                                                </div>
                                                <div class="p-right">
                                                    <p class="p-name"><a
                                                                href="{{url('details',$row['id'])}}">
                                                            {{$row['name']}}
                                                        </a></p>
                                                    <p class="p-rice">{{number_format($row['price'])}}đ</p>
                                                    <p>Số lượng: {{$row['quantity']}}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="toal-cart">
                                    <span>Tổng tiền</span>
                                    <span class="toal-price pull-right">{{number_format($total)}}đ</span>
                                </div>
                                <div class="cart-buttons">
                                    <a href="/thanh-toan.html" class="btn-check-out">Thanh toán</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>