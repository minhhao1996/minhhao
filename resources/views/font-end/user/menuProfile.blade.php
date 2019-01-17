<div class="col-md-3">
    <div class="menu-account ng-scope" ng-controller="accountController">
        <h3>
                      <span>
                           Quản lý cá nhân
                     </span>
        </h3>
        <ul>
            <li><a href="{{url('editProfile',Auth::user()->name)}}"><i class="fa fa-edit"></i> Thay đổi thông tin</a></li>
            <li><a href="{{url('ProfileOrder')}}"><i class="fa fa-list-alt"></i> Đơn hàng của
                    tôi</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> Sản phẩm yêu thích</a>
            </li>
            <li><a href="/thay-doi-mat-khau.html"><i class="fa fa-key"></i> Thay đổi mật khẩu</a></li>

        </ul>
    </div>

</div>