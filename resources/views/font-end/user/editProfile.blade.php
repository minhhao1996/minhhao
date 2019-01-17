@extends('layouts.app')

@section('content')
    @include('layouts.menuMain')
    <div class="main">
        <div class="container">
            <div class="row">
              @include('font-end/user.menuProfile')
                <div class="col-md-9">
                    <style >
                        .cprofile-info label{
                            text-align: left;
                        }
                    </style>
                    <div class="comunication-content clearfix ng-scope">
                        <h1 class="page-heading"><span>Thông tin tài khoản</span></h1>

<style>
    .form-group .control-label{
        text-align: left;
    }
    .avatars img{
        height: 150px;
        width: 150px;
        border-radius: 5px;;
    }
</style>

                            <form class="form-horizontal profile-info " enctype="multipart/form-data"  method="post" action="{{route('PostProfile',Auth::user()->id)}}">
                                @csrf

                                <div class="form-group">
                                    <label for="Name" class="col-sm-3 control-label">Avatar</label>
                                    <div class="col-sm-9">
                                        @if($profile['avatar']==null)
                                            <div class="avatars"><img src="{{asset('images/avatar.jpg')}}"></div>
                                            @else
                                            <div class="avatars" ><img class="product-av" src="{{asset('images/avatar/'.$profile['avatar'])}}"></div>
                                        @endif
                                            <input type="file"  id="image_list" name="avatar" multiple="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Name" class="col-sm-3 control-label">Họ tên</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" required value="{{old('name',isset($profile) ? $profile['name']:null)}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Giới tính</label>
                                    <div class="col-sm-9">
                                        <select class="form-control ng-pristine ng-untouched ng-valid" name="GenderId">
                                            <option value="0" label="Nữ">Nữ</option>
                                            <option value="1" label="Nam" selected="selected">Nam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Name" class="col-sm-3 control-label">Họ tên</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="birthday" required value="{{old('name',isset($profile) ? $profile['birthday']:null)}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Điện thoại</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control ng-pristine ng-untouched ng-valid" name="phone" value="{{old('phone',isset($profile) ? $profile['phone']:null)}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Địa chỉ</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control ng-pristine ng-untouched ng-valid" name="address" value="{{old('address',isset($profile) ? $profile['address']:null)}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tỉnh/TP</label>
                                    <div class="col-sm-9">
                                        <select name="country" id="province_id" class="form-control input-lg dynamic" data-dependent="state">
                                            <option value="">Vui Lòng Chọn Tỉnh Thành</option>
                                            @foreach($city as $country)
                                                <option value="{{ $country['province_id']}}"  <?php if( $country['province_id']==$profile['city_id'] ) echo 'selected';?> label="{{ $country['name'] }}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Quận/Huyện</label>
                                    <div class="col-sm-9">
                                        @if(!empty($distric))
                                        <select class="form-control ng-pristine ng-untouched ng-valid" name="district" id="district_id" >

                                        @foreach($distric as $a)
                                            <option value="{{$a['district_id']}}" <?php if( $a['district_id']==$profile['district_id'] ) echo 'selected';?>>{{$a['name']}}</option>
                                            @endforeach

                                        </select>
                                            @else

                                            <select class="form-control ng-pristine ng-untouched ng-valid" name="district" id="district_id" >

                                                <option value="">Vui Lòng Chọn quận huyện</option>

                                            </select>
                                            @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>

    </div>

    <script>

          $(document).ready(function($){
              $('#province_id').on('change', function(e) {
                  let province_id = $(this).find(":selected").val();
                  let   token = $("input[name='_token']").val();
                  $.ajax({
                      type: 'get', // phương thức gửi
                      url: '{{route('get-district')}}', //tới route mà chúng ta đã định nghĩa ở trên.
                      data: {
                          province_id: province_id,
                          _token: token
                      }, // gửi đi id của thành phố cần lấy.
                  }).done(function(res) { // khi gửi và nhận thành công sẽ nhận được res
                      console.log(res);
                      let html = '<option value="none" selected >' +
                          'Vui Lòng Chọn Quận/huyện' +
                          '</option >';
                      for (var i in res) {
                          html +=
                              '<option value="' + res[i].district_id  + '"' +
                              ' label="' + res[i].name + '"' +
                              res[i].name +
                              '</option>';

                      }
                      $('#district_id').html(html);
                  });
              });
          });
       function province() {
               $.ajax({
                   method: "GET",
                   url: "https://raw.githubusercontent.com/minhhao1996/Province_Distrisct_VN/master/hanhchinhvn/dist/tinh_tp.json",
                   success: function (result) {
                       //nhớ là ko sài var nha
                       let res = JSON.parse(result);
                       let arrKey = Object.keys(res);
                       let html = '<option value="none" selected >' +
                           'Vui Lòng Chọn Tỉnh Thành' +
                           '</option >';
                       for (let i = 0; i < arrKey.length; i++) {
                           html +=
                               '<option value="' + res[arrKey[i]].code + '"' +
                               ' label="' + res[arrKey[i]].name + '"' +
                               res[arrKey[i]].name +
                               '</option>';
                       }
                       $('#province ').html(html);
                   },
                   error: function (err) {
                       console.log(err);
                   }
               });
           }
           function district(){
                $("#province").change(function(event){
                    let  province_id = $("#province").val();
                    $.ajax({
                        method: "GET",
                        url: "https://raw.githubusercontent.com/minhhao1996/Province_Distrisct_VN/master/hanhchinhvn/dist/quan_huyen.json",
                        success: function (result) {
                            let res = JSON.parse(result);
                            let arrKey = Object.keys(res);
                            let html = "";
                            for (let i = 0; i < arrKey.length; i++) {
                                let id = res[arrKey[i]].parent_code;

                                if (id == province_id) {
                                    html +=
                                        '<option value="' + res[arrKey[i]].code + '"' +
                                        ' label="' + res[arrKey[i]].name + '"' +
                                        res[arrKey[i]].name +
                                        '</option>';
                                }
                            }
                            $('#district_id ').html(html);
                        },
                        error: function (err) {
                            alert('hhhh');
                            console.log(err);
                        }

                    });
               });
           }
    </script>

@endsection