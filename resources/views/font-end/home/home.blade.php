@extends('layouts.app')

@section('content')
    @include('layouts.menuMain')
    @include('layouts.slider')

    <div class="adv">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content">
                        <h2 class="page-heading">
                         <span class="page-heading-title">
                             Sản phẩm khuyến mãi
                          </span>
                        </h2>
                    </div>
                    <!--End-->
                    <div class="latest-deals-product">
                        <ul class="product-list owl-carousel owl-theme owl-loaded" id="sale">
                            @foreach($pro_sale as $sale)

                                @if($sale['status'] == 1)
                                    <div class=item">
                                        <li class="ng-scope">
                                            <div class="left-block">
                                                <a href="{{url('details',$sale['id'])}}"><img
                                                            class="img-responsive"
                                                            style="height: 250px;object-fit: cover;"
                                                            src="{{asset('upload/product/avatar')}}/{{$sale['avatar']}}"></a>
                                                <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Xem chi tiết" class="compare"
                                                       href="{{url('details',$sale['id'])}}"></a>
                                                    <a href="javascript:void(0);"
                                                       class="qv-e-button btn-quickview-1 search" title="Xem nhanh"
                                                       data-handle="/san-pham/noi-com-dien-panasonic-sr-ga721wra.html"></a>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a class="add-to-car" href="{{url('addCart',[$sale['id'],$sale['name']])}}"
                                                       ng-click="AddToCard(item)">Thêm vào giỏ</a>
                                                </div>
                                                <div class="price-percent-reduction2 ng-binding">
                                                    Sale
                                                    <br>- {{$sale['discount']}}<strong>%</strong>
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name"><a
                                                            href="{{url('details',$sale['id'])}}"
                                                            class="ng-binding">{{$sale['name']}}</a>
                                                </h5>

                                                <div class="content_price ng-scope">
                                                    @if(!empty($sale['discount']))
                                                        <span
                                                                class="price product-price ng-binding ng-scope">
                                               <?php $price_sale = $sale['price'] - $sale['price'] * $sale['discount'] / 100;
                                                            echo number_format($price_sale);
                                                            ?>
                                           </span>
                                                        <span
                                                                class="price old-price ng-binding ng-scope">{{number_format($sale['price'])}}₫
                                            </span>
                                                    @else
                                                        <span
                                                                class="price product-price ng-binding ng-scope">{{number_format($sale['price'])}}₫
                                           </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="content-page">
                        <div class="container">
                            @foreach($catPhone as $phone)
                                <div class="category-featured featured1">
                                    <nav class="navbar nav-menu show-brand">
                                        <div class="container">
                                            <!-- Brand and toggle get grouped for better mobile display -->
                                            <div class="navbar-brand"><a href="{{route('HomeCat',$phone['id'])}}"><img
                                                            src="{{asset('upload/category/icon')}}/{{$phone['icon']}}"/>
                                                    {{$phone['name']}}
                                                </a></div>
                                            <span class="toggle-menu" id="menu-home"></span>
                                            <!-- Collect the nav links, forms, and other content for toggling -->
                                            <div class=" navbar-collapse" id="menu-mobile">
                                                <ul class="nav navbar-nav">
                                                    <li class="active"><a href="{{route('HomeCat',$phone['id'])}}">Tất
                                                            cả sản phẩm</a></li>
                                                    @foreach($phone->subs as $sub)
                                                        <li><a class="sub" href="{{route('HomeCat',$sub['id'])}}">
                                                                {{$sub['name']}}
                                                            </a></li>
                                                    @endforeach
                                                </ul>
                                            </div><!-- /.navbar-collapse -->
                                        </div><!-- /.container-fluid -->
                                    </nav>
                                    <script>
                                        $(document).ready(function () {
                                            var number = 0;
                                            $("#menu-home").click(function () {
                                                number++;

                                                $("#menu-mobile").toggle(function (a, b) {
                                                    if (number % 2 != 0) {
                                                        $("#menu-mobile").show();
                                                    } else {
                                                        $("#menu-mobile").hide();
                                                    }
                                                });
                                            });

                                        });

                                    </script>
                                    <div class="product-featured clearfix">
                                        <div class="row">

                                            <div class="col-sm-12 ">
                                                <div class="product-featured-tab-content">
                                                    <ul class="product-list row">
                                                        <?php
                                                        $Cate = DB::table('categorys')->where('parent_id', $phone['id'])->select('id', 'name')->get()->toArray();
                                                        $cat_id = array();
                                                        foreach ($Cate as $ca) {
                                                            $cat_id [] = $ca->id;
                                                        }
                                                        $product = DB::table('products')->whereIn('cat_id', $cat_id)->orderBy('id', 'desc')->limit(12)->get()->toArray();
                                                        ?>
                                                        @foreach($product as $pro)
                                                            @if($pro->status==1)

                                                                <li class="col-sm-3">
                                                                    <div class="right-block">
                                                                        <h5 class="product-name"><a
                                                                                    href="{{url('details',$pro->id)}}">{{$pro->name}}</a></h5>
                                                                        <div class="content_price">
                                                                            @if(!empty($pro->discount))
                                                                                <span class="price product-price"> <?php  $price_new = (($pro->price) - ($pro->price) * ($pro->discount) / 100);
                                                                                    echo number_format($price_new)
                                                                                    ?>₫</span>
                                                                                <span class="price old-price">

                                                                                       {{number_format($pro->price)}}₫
                                                                                     </span>
                                                                            @else
                                                                                <span class="price product-price"> {{number_format($pro->price)}}₫</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="left-block">
                                                                        <a href="{{url('details',$pro->id)}}"><img
                                                                                    class="img-responsive" alt="product"
                                                                                    src="{{asset('upload/product/avatar')}}/{{$pro->avatar}}"></a>
                                                                        <div class="quick-view">
                                                                            <a title="Add to my wishlist" class="heart"
                                                                               href="#"></a>
                                                                            <a title="Xem chi tiết" class="compare"
                                                                               href="{{url('details',$pro->id)}}"></a>
                                                                            <a href="javascript:void(0);"
                                                                               class="qv-e-button btn-quickview-1 search"
                                                                               title="Xem nhanh"
                                                                               data-handle="/san-pham/dam-body-ca-tinh-voi-nhieu-mau-sac-hien-dai-tre-trung.html"></a>
                                                                        </div>
                                                                        <div class="add-to-cart">
                                                                            <a class="add-to-car"
                                                                               href="javascript:void(0);"
                                                                               onclick="AddToCard(51001,1)">Thêm vào
                                                                                giỏ</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('layouts.partner')
@endsection
