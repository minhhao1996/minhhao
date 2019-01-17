@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="breadcrumb clearfix">
                        <ul>
                            <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                            </li>
                            <li class="icon-li"><strong>Thanh toán</strong></li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        $(".link-site-more").hover(function () {
                            $(this).find(".s-c-n").show();
                        }, function () {
                            $(this).find(".s-c-n").hide();
                        });
                    </script>
                    <div class="payment-content ng-scope" ng-controller="orderController"
                         ng-init="initCheckoutController()">
                        <h1 class="page-heading"><span>Thanh toán</span></h1>
                        <div class="steps clearfix">
                            <ul class="clearfix">
                                <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0">
                                    <span><i class="fa fa-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span
                                            class="step-number"><a>1</a></span></li>
                                <li class="payment active col-md-2 col-xs-12 col-sm-4"><span><i
                                                class="fa fa-money"></i></span><span>Thanh toán</span><span
                                            class="step-number"><a>2</a></span></li>
                                <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i
                                                class="fa fa-check"></i></span><span>Hoàn tất</span><span
                                            class="step-number"><a>3</a></span></li>
                            </ul>
                        </div>
                        <form action="{{route('postCheckout')}}" method="post" enctype="multipart/form-data" method="get" accept-charset="utf-8">
                       @csrf
                        <div class="payment-block clearfix "
                             id="checkout-container">
                            <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
                                <h4>1. Địa chỉ thanh toán và giao hàng</h4>
                                <div class="step-preview clearfix">
                                    <h2 class="title">Thông tin thanh toán</h2>
                                    @if(!isset($profile))
                                        <div class="form-block ng-scope" ng-if="CustomerId<=0">
                                            <div class="user-login"><a href="{{url('resgister')}}">Đăng ký tài khoản mua
                                                    hàng</a><a
                                                        href="{{url('login')}}">Đăng nhập</a></div>
                                            <label>Mua hàng không cần tài khoản</label>
                                            <div class="form-group"><input
                                                        class="form-control " name="name"
                                                        placeholder="Họ &amp; Tên" type="text"
                                                        required=""></div>
                                            <div class="form-group"><input
                                                        class="form-control " name="phone"
                                                        placeholder="Phone" type="number"
                                                        required=""></div>
                                            <div class="form-group"><input
                                                        class="form-control" name="email"
                                                        placeholder="Email" type="email"
                                                        required=""></div>
                                            <div class="form-group"><input
                                                        class="form-control" name="address"
                                                        placeholder="Địa chỉ" type="text"
                                                        required=""></div>
                                            <div class="form-group">
                                                <select name="country" id="province_order" class="form-control " required>
                                                    <option value="">Vui Lòng Chọn Tỉnh Thành</option>
                                                    @foreach($city as $country)
                                                        <option value="{{ $country['province_id']}}"
                                                                label="{{ $country['name'] }}">{{ $country['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">

                                                <select class="form-control " name="district" id="district_order">
                                                    <option value="">Vui Lòng Chọn Quận/huyện</option>

                                                </select>

                                            </div>
                                            <textarea class="form-control " rows="4" name="about"
                                                      placeholder="Ghi chú đơn hàng"></textarea>
                                             </div>
                                    @else

                                        <div class="form-block ng-hide">
                                            <div class="form-group"><input
                                                        class="form-control " value="{{$profile['name']}}" name="name"
                                                        placeholder="Họ &amp; Tên" type="text">
                                            </div>
                                            <div class="form-group"><input
                                                        class="form-control" name="phone"
                                                        placeholder="Số điện thoại" type="number"
                                                        value="{{$profile['phone']}}">
                                            </div>
                                            <div class="form-group"><input name="email"
                                                        class="form-control " value="{{$profile['email']}}" disabled
                                                        placeholder="Email" type="email">
                                            </div>
                                            <div class="form-group"><input name="address"
                                                        class="form-control " value="{{$profile['address']}}"
                                                        placeholder="Địa chỉ" type="text">
                                            </div>
                                            <div class="form-group">
                                                <select name="country" id="province_order" class="form-control " >
                                                    <option value="">Vui Lòng Chọn Tỉnh Thành</option>
                                                    @foreach($city as $country)
                                                        <option value="{{ $country['province_id']}}"
                                                                <?php if ($country['province_id'] == $profile['city_id']) echo 'selected';?> label="{{ $country['name'] }}">{{ $country['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                @if(!empty($distric))
                                                    <select class="form-control " name="district" id="district_order">
                                                        @foreach($distric as $a)
                                                            <option value="{{$a['district_id']}}" <?php if ($a['district_id'] == $profile['district_id']) echo 'selected';?>>{{$a['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select class="form-control " name="district" id="district_order">


                                                    </select>
                                                @endif
                                            </div>
                                            <textarea class="form-control " rows="4" name="about"
                                                      placeholder="Ghi chú đơn hàng"></textarea>
                                        </div>

                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
                                <h4>2. Thanh toán và vận chuyển</h4>
                                <div class="step-preview clearfix">
                                    <h2 class="title">Vận chuyển</h2>
                                    <div class="form-group ">
                                        <select class="form-control " id="transport">
                                            <option value="20000">Nội thành HCM (20.000VNĐ)</option>
                                            <option value="30000">Ngoại Thành HCM (30.000VNĐ)</option>
                                            <option value="40000">Tỉnh Khác HCM (40.000VNĐ)</option>
                                        </select>
                                    </div>
                                    <h2 class="title">Thanh toán</h2>
                                    <select class="form-control " name="payment">
                                        <option value="">----Phương Thức Thanh Toán----</option>
                                        <option value="office">Thanh toán khi nhận hàng</option>
                                        <option value="paypal">Thanh toán Paypal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
                                <h4>3. Thông tin đơn hàng</h4>
                                <div class="step-preview">

                                    <div class="cart-info">
                                        @foreach($content as $row)
                                            <div class="cart-items">
                                                <!-- ngRepeat: item in OrderDetails -->
                                                <div class="cart-item clearfix ng-scope">
                            <span class="image pull-left" style="margin-right:10px;">
                                <a href="{{url('details',$row['id'])}}">
                                     <img src="{{asset('upload/product/avatar')}}/{{$row['attributes']['img']}}"
                                          class="img-responsive">
                                </a>
                            </span>
                                                    <div class="product-info pull-left">
                                <span class="product-name">
                                    <a href="{{url('details',$row['id'])}}"
                                       class="ng-binding">{{$row['name']}}</a> x <span
                                            class="ng-binding">{{$row['quantity']}}</span>
                                </span>
                                                    </div>
                                                    <span class="price ng-binding">{{number_format($row['price']*$row['quantity'])}} ₫</span>
                                                </div>
                                            </div>

                                        @endforeach

                                        <div class="total-price">
                                            Thành tiền <label class="ng-binding"> {{number_format($total)}}₫</label>
                                        </div>

                                        <div class="shiping-price">
                                            Phí vận chuyển <label class="ng-binding">30.000 ₫</label>
                                        </div>
                                        <div class="btn-coupon hidden">
                                            <a href="#" class="btn btn-primary"><span></span>Sử dụng mã giảm giá
                                            </a>
                                        </div>
                                        <div class="use-coupon hidden">
                                            <div class="form-group">
                                                <input placeholder="Nhập mã giảm giá"
                                                       class="coupon-code form-control">
                                                <a class="btn btn-primary">Sử dụng</a>
                                            </div>
                                        </div>
                                        <div class="total-payment">
                                            Thanh toán <span class="ng-binding"> {{number_format($total+30000)}} ₫</span>
                                        </div>
                                        <div class="button-submit">
                                            <button class="btn btn-primary" type="submit">Đặt hàng</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                   </form>
                    </div>
                    <script>

                        $(document).ready(function ($) {
                            $('#province_order').on('change', function (e) {
                                let province_id = $(this).find(":selected").val();
                                let token = $("input[name='_token']").val();
                                $.ajax({
                                    type: 'get', // phương thức gửi
                                    url: '{{route('get-district')}}', //tới route mà chúng ta đã định nghĩa ở trên.
                                    data: {
                                        province_id: province_id,
                                        _token: token
                                    },
                                }).done(function (res) { // khi gửi và nhận thành công sẽ nhận được res
                                    let html = '';
                                    for (var i in res) {
                                        html +=
                                            '<option value="' + res[i].district_id + '"' +
                                            ' label="' + res[i].name + '"' +
                                            res[i].name +
                                            '</option>';
                                    }
                                    $('#district_order').html(html);
                                });
                            });

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
