@extends('layouts.app')

@section('content')
    @include('layouts.menuMain')
    <div id="product">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="breadcrumb clearfix">
                            <ul>
                                <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                    <a title="Đến trang chủ" href="/" itemprop="url"><span
                                                itemprop="title">Trang chủ</span></a>
                                </li>
                                <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""
                                    class="category17 icon-li">
                                    <div class="link-site-more">
                                        @foreach($cate as $c)
                                            <a title="" href="{{url('category')}}/{{$c['id']}}" itemprop="url">
                                                <span itemprop="title">{{$c['name']}}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </li>
                                @foreach($det as $c)
                                    <li class="productname icon-li"><strong>{{$c['name']}}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <script type="text/javascript">
                            $(".link-site-more").hover(function () {
                                $(this).find(".s-c-n").show();
                            }, function () {
                                $(this).find(".s-c-n").hide();
                            });
                        </script>

                        @foreach($det as $row)
                            <div class="product-detail clearfix relative ng-scope">
                                <!--Begin-->
                                <style>
                                    .swiper-container {
                                        width: 100%;
                                        margin-left: auto;
                                        margin-right: auto;
                                    }

                                    .swiper-slide {
                                        background-size: cover;
                                        background-position: center;
                                    }

                                    .gallery-top {
                                        height: 400px;
                                        width: 100%;
                                    }

                                    .gallery-thumbs {
                                        width: 100%;
                                        height: 100px;
                                        box-sizing: border-box;
                                        padding: 10px 0;
                                    }

                                    .gallery-thumbs .swiper-slide {
                                        width: 25%;
                                        height: 100%;
                                        opacity: 0.5;
                                    }

                                    .gallery-thumbs .swiper-slide-thumb-active {
                                        opacity: 1;
                                    }
                                </style>
                                <div class="product-block clearfix">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 product-image clearfix">
                                            <div class="swiper-container gallery-top">
                                                <div class="swiper-wrapper">
                                                    @foreach($detImg as $img)
                                                        <div class="swiper-slide"
                                                             style="background-image:url({{asset('upload/product/detail')}}/{{$img['file_name']}});"></div>
                                                    @endforeach

                                                </div>
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next swiper-button-white"></div>
                                                <div class="swiper-button-prev swiper-button-white"></div>
                                            </div>
                                            <div class="swiper-container gallery-thumbs">
                                                <div class="swiper-wrapper">
                                                    @foreach($detImg as $img)
                                                        <div class="swiper-slide"
                                                             style="background-image:url({{asset('upload/product/detail')}}/{{$img['file_name']}}); "></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var galleryThumbs = new Swiper('.gallery-thumbs', {
                                                spaceBetween: 10,
                                                slidesPerView: 4,
                                                freeMode: true,
                                                watchSlidesVisibility: true,
                                                watchSlidesProgress: true,
                                            });
                                            var galleryTop = new Swiper('.gallery-top', {
                                                spaceBetween: 10,
                                                navigation: {
                                                    nextEl: '.swiper-button-next',
                                                    prevEl: '.swiper-button-prev',
                                                },
                                                thumbs: {
                                                    swiper: galleryThumbs
                                                }
                                            });
                                        </script>
                                        <style></style>
                                        <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
                                            <div class="area_price">
                                                <h2 class="ng-binding">{{$row['name']}} </h2>
                                                @if($row['discount']>0)
                                                    <label class="installment"
                                                           style=" background: red;  float: right">Giảm {{$row['discount']}}
                                                        %
                                                    </label>
                                                @endif
                                            </div>


                                            <div class="price ng-scope">

                                                <div ng-if="IsPromotion==true" class="ng-scope">
                                                    @if(!empty($row['discount']))
                                                        <?php $price_new = $row['price'] - $row['price'] * $row['discount'] / 1000 ?>

                                                        <span class="price-new ng-binding">{{number_format($price_new)}}đ</span>
                                                        <span class="price-old ng-binding">{{number_format($row['price'])}}đ</span>

                                                    @else
                                                        <span class="price-new ng-binding">{{number_format($row['price'])}}đ</span>
                                                    @endif
                                                </div><!-- end ngIf: IsPromotion==true -->
                                                <!-- ngIf: IsPromotion==false -->
                                                <span class="product-code ng-binding">Mã SP: SKU-0</span>
                                            </div>
                                            <div class="des ng-binding" ng-bind-html="Summary|unsafe">
                                                <div class=""><strong>Quà tặng:</strong>{{$row['gifts']}}</div>
                                                <div class=""><strong>Bảo Hành:</strong> {{$row['warranty']}}</div>
                                            </div>
                                            <div class="social">
                                                <!-- AddThis Button BEGIN -->
                                                <div class="fb-like"
                                                     data-href="{{url('details')}}/{{$row['id']}}"
                                                     data-layout="button_count" data-action="like" data-size="small"
                                                     data-show-faces="true" data-share="true">
                                                </div>
                                                <span style="float: right"><i
                                                            class="fa fa-eye"></i> {{$row['views']}}</span>

                                                <!-- AddThis Button END -->
                                            </div>
                                            <div class="option ng-scope" ng-repeat="item in ProductOptions">
                                                <label class="ng-binding">Tình trạng:</label>

                                                {{$row['total']}}
                                                <div class="clearfix"></div>
                                            </div>


                                                @if($row['total']==0)
                                                <div class="action-cart ng-scope">
                                                    <a href="javascript:void(0)" onclick="addToCardBuy()"
                                                       class="btn btn-primary"><i class="fa fa-warning"></i> Hết hàng
                                                    </a>
                                                </div>
                                                @else
                                                <div class="action-cart ng-scope">
                                                    <a href="javascript:void(0)" onclick="addToCardBuy()"
                                                       class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Mua
                                                        ngay</a>
                                                </div>
                                                    @endif

                                            <script>
                                                var cart = [];
                                                $(document).ready(function () {
                                                    cart = localStorage.getItem('cart');
                                                    if (cart == null) {
                                                        cart = [];
                                                        localStorage.setItem('cart', JSON.stringify(cart));
                                                    } else {
                                                        cart = JSON.parse(cart);
                                                    }

                                                });

                                                function addToCard($row) {
                                                    var data = {
                                                        name: $row['id'],
                                                        price: $row['price']
                                                    };
                                                    alert(hh);
                                                    var checked = checkCart(data.name);

                                                    if (checked == -1) {
                                                        data.quantity = 1;
                                                        cart.push(data);
                                                    } else {
                                                        cart[checked].quantity++;
                                                    }

                                                    /* Cập nhật localStorage */
                                                    localStorage.setItem('cart', JSON.stringify(cart));
                                                }

                                            </script>
                                            <div class="call">
                                                <p class="title">Để lại số điện thoại, chúng tôi sẽ tư vấn ngay sau từ 5
                                                    ›
                                                    10 phút</p>
                                                <div class="input">
                                                    <div class="input-group">
                                                        <input class="form-control ng-pristine ng-untouched ng-valid"
                                                               ng-model="CustomerPhone"
                                                               onblur="if(this.value=='')this.value='Nhập số điện thoại...'"
                                                               onfocus="if(this.value=='Nhập số điện thoại...')this.value=''"
                                                               value="Nhập số điện thoại..." type="text">
                                                        <span class="input-group-btn">
                                                <button class="btn btn-primaryphone" type="button" ng-click="callMe()"><i
                                                class="fa fa-phone"></i> Gọi lại cho tôi</button>
                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#home">Đặc điểm nổi bật </a></li>
                                        <li><a data-toggle="tab" href="#menu1">Bình luận</a></li>
                                        <li><a data-toggle="tab" href="#menu2">Sản phẩm cùng thể loại</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <h3>{{$row['title']}}</h3>
                                            <div>{!! $row['contents'] !!} </div>
                                        </div>
                                        <div id="menu1" class="tab-pane fade">
                                            <div class="fb-comments fb_iframe_widget" style="width: 100%">
                                                <div class="fb-comments"
                                                     data-href="{{url('details')}}/{{$row['id']}}"
                                                     data-width="100%" data-numposts="5"></div>

                                            </div>
                                        </div>
                                        <div id="menu2" class="tab-pane fade">
                                            <h3>Sản phẩm cùng thể loại</h3>
                                            <ul class="row product-list grid filter">
                                                @foreach($pro_like as $like)
                                                    @if($like['status']==1 )
                                                        <li class="col-md-4 col-sm-6 col-xs-12">
                                                            <div class="product-container product-resize fixheight"
                                                                 style="height: 252px;">
                                                                <div class="left-block image-resize"
                                                                     style="height: 200px;">
                                                                    <a href="{{url('details',$like['id'])}}"><img
                                                                                class="img-responsive" alt="product"
                                                                                src="{{asset('upload/product/avatar')}}/{{$like['avatar']}}"></a>
                                                                    <div class="quick-view">
                                                                        <a title="Add to my wishlist" class="heart"
                                                                           href="#"></a>
                                                                        <a title="Xem chi tiết" class="compare"
                                                                           href="{{url('details',$like['id'])}}"></a>
                                                                        <a href="javascript:void(0);"
                                                                           class="qv-e-button btn-quickview-1 search"
                                                                           title="Xem nhanh"></a>
                                                                    </div>
                                                                    <div class="add-to-cart">
                                                                        <a class="add-to-car" href="javascript:void(0);"
                                                                           onclick="AddToCard(51001,1)">Thêm vào giỏ</a>
                                                                    </div>
                                                                </div>

                                                                <div class="right-block">
                                                                    <h5 class="product-name"><a
                                                                                href="{{url('details',$like['id'])}}">
                                                                            {{$like['name']}}
                                                                        </a></h5>
                                                                    <div class="content_price">
                                                                        @if(!empty($like['discount']))
                                                                            <?php $price_like = $like['price'] - $like['price'] * $like['discount'] / 100?>
                                                                            <span class="price product-price"> {{number_format($price_like)}}₫</span>
                                                                            <span class="price old-price">{{number_format($like['price'])}}₫</span>
                                                                        @else
                                                                            <span class="price product-price">{{number_format($like['price'])}}₫</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                                <!--End-->


                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-3">

                        <!--Begin-->
                        <div class="box-sale-policy ng-scope" ng-controller="moduleController"
                             ng-init="initSalePolicyController('Shop')">
                            <h3><span>Chính sách bán hàng</span></h3>
                            <div class="sale-policy-block">
                                <ul>
                                    <li>Giao hàng TOÀN QUỐC</li>
                                    <li>Thanh toán khi nhận hàng</li>
                                    <li>Đổi trả trong <span>15 ngày</span></li>
                                    <li>Hoàn ngay tiền mặt</li>
                                    <li>Chất lượng đảm bảo</li>
                                    <li>Miễn phí vận chuyển:<span>Đơn hàng từ 3 món trở lên</span></li>
                                </ul>
                            </div>
                            <div class="buy-guide">
                                <h3>Hướng Dẫn Mua Hàng</h3>
                                <ul>
                                    <li>
                                        Mua hàng trực tiếp tại website
                                        <b class="ng-binding"> http://www.runtime.vn</b>
                                    </li>
                                    <li>
                                        Gọi điện thoại <strong class="ng-binding">
                                            0366403210
                                        </strong> để mua hàng
                                    </li>
                                    <li>
                                        Mua tại Trung tâm CSKH:<br>
                                        <strong class="ng-binding">98 Man Thiện, P.Hiệp Phú, Quận 9, Tp.HCM</strong>
                                        <a href="/ban-do.html" rel="nofollow" target="_blank">Xem Bản Đồ</a>
                                    </li>
                                    <li>
                                        Mua sỉ/buôn xin gọi <strong class="ng-binding">
                                            0366 403210
                                        </strong> để được
                                        hỗ trợ.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--End-->
                        @include('layouts.productHot')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection