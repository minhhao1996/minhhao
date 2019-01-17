@extends('layouts.app')

@section('content')
    @include('layouts.menuMain')

    <div id="collection">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">

                        <div class="breadcrumb clearfix">
                            <ul>
                                <li itemtype="http://minhhao.vn" itemscope="" class="home">
                                    <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                </li>
                                <li itemtype="" itemscope="" class="category17 icon-li">
                                    <div class="link-site-more">
                                        <a title="Search" href="">
                                            <span itemprop="title">Kết quả tìm kiếm</span>
                                        </a>
                                    </div>
                                </li>


                            </ul>
                        </div>
                        <script type="text/javascript">
                            $(".link-site-more").hover(function () {
                                $(this).find(".s-c-n").show();
                            }, function () {
                                $(this).find(".s-c-n").hide();
                            });
                        </script>

                        <div id="view-product-list" class="view-product-list">
                            <h2 class="page-heading">

                                    <span class="page-heading-title">search</span>

                            </h2>
                            <ul class="display-product-option">
                                <li class="view-as-grid selected">
                                    <span>grid</span>
                                </li>
                                <li class="view-as-list">
                                    <span>list</span>
                                </li>
                            </ul>

                            <!-- PRODUCT LIST -->
                            <ul class="row product-list grid filter">
                                @foreach($pro_search as $row)
                                    <li class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="product-container product-resize fixheight"
                                             style="height: 252px;">
                                            <div class="left-block image-resize" style="height: 200px;">
                                                <a href="{{url('details',$row['id'])}}"><img
                                                            class="img-responsive" alt="product"
                                                            src="{{asset('upload/product/avatar')}}/{{$row['avatar']}}"></a>
                                                <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Xem chi tiết" class="compare"
                                                       href="{{url('details',$row['id'])}}"></a>
                                                    <a href="javascript:void(0);"
                                                       class="qv-e-button btn-quickview-1 search" title="Xem nhanh"
                                                       data-handle="/san-pham/dam-body-ca-tinh-voi-nhieu-mau-sac-hien-dai-tre-trung.html"></a>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a class="add-to-car" href="javascript:void(0);"
                                                       onclick="AddToCard(51001,1)">Thêm vào giỏ</a>
                                                </div>
                                            </div>

                                            <div class="right-block">
                                                <h5 class="product-name"><a
                                                            href="{{url('details',$row['id'])}}">
                                                        {{$row['name']}}
                                                    </a></h5>
                                                <div class="content_price">
                                                    @if(!empty($row['discount']))
                                                        <span class="price product-price"> <?php
                                                            $price_new = ($row['price']) - (($row['price']) * ($row['discount']) / 100);
                                                            echo number_format($price_new)
                                                            ?>₫</span>
                                                        <span class="price old-price">
                                                                                      {{number_format($row['price'])}}₫
                                                                                     </span>
                                                    @else
                                                        <span class="price product-price">  {{number_format($row['price'])}}₫</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                            <!-- ./PRODUCT LIST -->
                        </div>
                        <!--Template--
                        --End-->
                    </div>
                    <div class="col-md-3">
                        <div class="menu-product">
                            <h3>
                                 <span>
                                     DANH MỤC
                                  </span>
                            </h3>
                            <ul class="level_0">
                                @foreach($cat_main as $row)
                                    @if(count($row->subs) > 0)

                                        <li class="child"><span><a class="active" href="{{route('HomeCat',$row['id'])}}"><i
                                                            class="fa fa-arrow-circle-right"></i> {{$row['name']}}</a></span><span
                                                    class="open-close"><i class="fa fa-angle-down"></i></span>
                                            <ul class="level_1 hidden-xs">
                                                @foreach($row->subs as $sub)
                                                    <li>
                                                        <span><a href="{{route('HomeCat',$sub['id'])}}"><i class="fa fa-check"></i> {{$sub['name']}}</a></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="child">
                                            <span>
                                                <a class="active" href="{{route('HomeCat',$row['id'])}}"><i
                                                            class="fa fa-arrow-circle-right"></i> {{$row['name']}}</a>
                                            </span>

                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @include('layouts.productHot')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
