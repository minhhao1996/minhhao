@extends('layouts.app')

@section('content')
    @include('layouts.menuMain')
    <div id="cart">
        <div class="main">
            <div class="container">
                <form action="" method="get" id="cartformpage">
                    @csrf
                <div class="row">
                    <div class="col-md-12">

                        <div class="breadcrumb clearfix">
                            <ul>
                                <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                    <a title="Đến trang chủ" href="/" itemprop="url"><span
                                                itemprop="title">Trang chủ </span></a>
                                </li>
                                <li class="icon-li"><strong>Giỏ hàng</strong></li>
                            </ul>
                        </div>
                        <script type="text/javascript">
                            $(".link-site-more").hover(function () {
                                $(this).find(".s-c-n").show();
                            }, function () {
                                $(this).find(".s-c-n").hide();
                            });
                        </script>
                        @if(!empty($content))
                        <div class="cart-content ng-scope" ng-controller="orderController"
                             ng-init="initOrderCartController()">
                            <h1 class="page-heading"><span>Giỏ hàng của tôi</span></h1>
                            <div class="steps clearfix">
                                <ul class="clearfix">
                                    <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0">
                                        <span><i class="fa fa-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span
                                                class="step-number"><a>1</a></span></li>
                                    <li class="payment col-md-2 col-xs-12 col-sm-4"><span><i
                                                    class="fa fa-usd"></i></span><span>Thanh toán</span><span
                                                class="step-number"><a>2</a></span></li>
                                    <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i
                                                    class="fa fa-check"></i></span><span>Hoàn tất</span><span
                                                class="step-number"><a>3</a></span></li>
                                </ul>
                            </div>
                            <div class="cart-block-info">
                                <div class="cart-info table-responsive">
                                    <table class="table product-list">
                                        <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Xóa</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($content as $con)
                                        <tr ng-repeat="item in OrderDetails" class="ng-scope">
                                            <td class="image">

                                                <a href="{{url('details',$con['id'])}}"> <img
                                                            src="{{asset('upload/product/avatar')}}/{{$con['attributes']['img']}}"
                                                            class="img-responsive"></a>
                                            </td>
                                            <td class="des">
                                                <a href="{{url('details',$con['id'])}}"
                                                   class="ng-binding">{{$con['name']}}</a>
                                                <span class="ng-binding"></span>
                                            </td>
                                            <td class="price ng-binding">{{number_format($con['price'])}}đ</td>
                                            <td class="quantity">
                                                <input type="number" value="{{$con['quantity']}}"
                                                       class="text ng-pristine ng-untouched ng-valid"
                                                       onchange="onChangeSL(id)"
                                                       id="{{$con['id']}}"
                                                       min="1" max="10"
                                                      >
                                            </td>
                                            <td class="amount ng-binding">
                                                {{number_format($con['price']*$con['quantity'])}}đ
                                            </td>
                                            <td class="">
                                                <a ng-click="removeItemCart(item)" href="{{url('removeCart',$con['id'])}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                                <script>
                                                    function onChangeSL(id){
                                                        let qty =  document.getElementById(id).value;
                                                        let _tonken = $("input[name='_token']").val();
                                                        $.ajax({
                                                            url:'updateCart/'+id+'/'+qty,
                                                            type: 'GET',
                                                            data: {"_token": _tonken, "qty": qty},
                                                            success: function (data) {
                                                                if (data == "OK") {
                                                                    window.location="cart";
                                                                }
                                                            }
                                                        })
                                                    }
                                                </script>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="clearfix text-right">
                                    <span><b>Tổng thanh toán:</b></span>
                                    <span class="pay-price ng-binding">
                                      {{number_format($total)}}đ
                                      </span>
                                </div>
                                <div class="text-right">
                                    <a class="comeback" href="/" onclick="window.history.back()">Tiếp tục mua hàng</a>
                                    <a class="button-default" id="checkout" href="{{url('check-out')}}">Tiến hành thanh
                                        toán</a>
                                </div>

                            </div>
                        </div>
                            @else
                            <div>
                          <strong>    Chưa có sản phẩm trong giỏ hàng</strong>
                            </div>
                            @endif
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
