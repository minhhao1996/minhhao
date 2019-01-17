<div id="nav-top-menu" class="nav-top-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="box-vertical-megamenus">
                <div class="box-vertical-megamenus menu-quick-select">
                    <h4 class="title click-menu">
                        <span class="title-menu">Danh mục sản phẩm</span>
                        <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                    </h4>
                </div>
            </div>
            <div id="main-menu-new" class="col-sm-12 col-md-9 main-menu">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#new-menu" aria-expanded="false" aria-controls="navbar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">MENU</a>
                        </div>
                        <div id="new-menu" class="navbar-collapse collapse">
                            <ul class='menu t-menu nav'>

                                @foreach($cat as $item)
                                <li class="level0" ><a class='' href='{{route('HomeCat',$item['id'])}}'><span>{{$item['name']}}</span></a>
                                    <img src={{asset('upload/category/icon')}}/{{$item['icon']}}>
                                </li>

                                @endforeach

                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- userinfo on top-->
        <div id="form-search-opntop">
        </div>
        <!-- userinfo on top-->

        <!-- CART ICON ON MMENU -->
        <div id="shopping-cart-box-ontop">
            <a href="/gio-hang.html"></a>
            <span class="icon-cart-ontop"></span>
            <span class="cart-items-count">0</span>
            <span class="text">Giỏ hàng</span>
            <div class="shopping-cart-box-ontop-content">
            </div>
        </div>
    </div>
</div>