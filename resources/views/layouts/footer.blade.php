
<div class="footer">
    <footer id="footer">
        <div class="container">

            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="/"><img src="{{asset('font-end/img/logo2.png')}}" alt="logo"/></a>
                        <div id="address-list">
                            <div class="tit-name">Địa chỉ:</div>
                            <div class="tit-contain">98 Man Thiện, Tăng Nhơn Phú A, Quận 9, HCM</div>
                            <div class="tit-name">Điện thoại:</div>
                            <div class="tit-contain">036 6403210</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">haole042@gmail.com</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="introduce-title">Về ch&#250;ng t&#244;i</div>
                            <ul class="introduce-list">
                                <li class="item">
                                    <a href="/gioi-thieu.html">
                                        Giới thiệu
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="/content/giao-hang-doi-tra.html">
                                        Giao h&#224;ng - Đổi trả
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="/content/chinh-sach-bao-mat.html">
                                        Ch&#237;nh s&#225;ch bảo mật
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="/lien-he.html">
                                        Li&#234;n hệ
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="introduce-title">Trợ gi&#250;p</div>
                            <ul class="introduce-list">
                                <li class="item">
                                    <a href="/content/huong-dan-mua-hang.html">
                                        Hướng dẫn mua h&#224;ng
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="/content/huong-dan-thanh-toan.html">
                                        Hướng dẫn thanh to&#225;n
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="/content/tai-khoan-giao-dich.html">
                                        T&#224;i khoản giao dịch
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box" >
                        <div class="introduce-title">Đăng ký nhận tin</div>
                        <form ng-submit="registerNewsletter()" class='contact-form'>
                            <div class="input-group" id="mail-box">
                                <input ng-model="newsletter.Email" type="email" placeholder="Đăng ký email"
                                       required="required"/>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Gửi</button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                        <div class="introduce-title">Liên kết</div>
                        <div class="social-link">
                            <a><i class="fa fa-facebook"></i></a>
                            <a><i class="fa fa-youtube"></i></a>
                            <a><i class="fa fa-twitter"></i></a>
                            <a><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div><!-- /#introduce-box -->

            <div id="trademark-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-list">
                        <li id="payment-methods">Phương thức thanh toán</li>
                        <li><a href="javascript:;"><img src="{{asset('font-end/img/pay/trademark_3.jpg')}}"
                                                        alt="Phương thức thanh toán 1"></a></li>
                        <li><a href="javascript:;"><img src="{{asset('font-end/img/pay/trademark_5.jpg')}}"
                                                        alt="Phương thức thanh toán 2"></a></li>
                        <li><a href="javascript:;"><img src="{{asset('font-end/img/pay/trademark_8.jpg')}}"
                                                        alt="Phương thức thanh toán 3"></a></li>
                        <li><a href="javascript:;"><img src="{{asset('font-end/img/pay/trademark_10.jpg')}}"
                                                        alt="Phương thức thanh toán 4"></a></li>
                    </ul>
                </div>
            </div> <!-- /#trademark-box -->
            <p class="cpr text-center">
                &copy;Coppy 2018 Bản quyền thuộc về <a href="http://minhhao.vn/" style="color: #0f9ed8" target="_blank">MinhHao</a> | <a target="_blank" href="https://www.runtime.vn">Powered by HAO DEP TRAI</a>.
            </p>
        </div>
    </footer>
</div>